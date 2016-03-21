<?php
/* captcha.php
 * Generates a captcha
 * Correct captcha code set in $_SESSION['$session_var'], $_SESSION['captcha'] by default
 *
 * @original author  Jose Rodriguez <jose.rodriguez@exec.cl>
 */

session_start();

$captcha = new SimpleCaptcha();

$captcha->CreateImage();

class SimpleCaptcha {
	public $width  = 130;
	public $height = 60;
	public $resourcesPath = '../font/';
	public $minWordLength = 5;
	public $maxWordLength = 6;
	public $session_var = 'captcha';
	public $maxRotation = 13;
	public $debug = false;
	public $imageFormat = 'png';

	//Font configuration
	public $fonts = array(
		'Antykwa'	=> array('spacing' => 20, 'minSize' => 27, 'maxSize' => 30, 'font' => 'AntykwaBold.ttf'),
		'DingDong'	=> array('spacing' => 20, 'minSize' => 24, 'maxSize' => 30, 'font' => 'Ding-DongDaddyO.ttf'),
		'Duality'	=> array('spacing' => 20, 'minSize' => 30, 'maxSize' => 38, 'font' => 'Duality.ttf'),
		'Heineken'	=> array('spacing' => 20, 'minSize' => 24, 'maxSize' => 34, 'font' => 'Heineken.ttf'),
		'Jura'	 	=> array('spacing' => 20, 'minSize' => 28, 'maxSize' => 32, 'font' => 'Jura.ttf'),
		'StayPuft'	=> array('spacing' => 20,'minSize' => 28, 'maxSize' => 30, 'font' => 'HacenLiner.ttf')
	);

	// Horizontal line through the text
	public $lineWidth = 1;
	// Wave configuracion in X and Y axes
	public $Yperiod	= 12;
	public $Yamplitude = 14;
	public $Xperiod	= 11;
	public $Xamplitude = 5;
	
	// GD image
	public $im;
	
	public function CreateImage() {
		$ini = microtime(true);

		// Initialization
		$this->ImageAllocate();
		imageantialias($this->im, true);
		
		// Text insertion
		$text = $this->GetCaptchaText();
		$fontcfg  = $this->fonts[array_rand($this->fonts)];
		$this->WriteText($text, $fontcfg);

		$_SESSION[$this->session_var] = $text;

		// Transformations
		if (!empty($this->lineWidth)) {
			$this->WriteLine();
			$this->WriteLine();
		}
		$this->WaveImage();
		$this->ReduceImage();


		if ($this->debug) {
			imagestring($this->im, 1, 1, $this->height-8,
				"$text {$fontcfg['font']} ".round((microtime(true)-$ini)*1000)."ms",
				$this->GdFgColor
			);
		}

		// Output
		$this->WriteImage();
		$this->Cleanup();
	}
	
	/**
	 * Creates the image resources
	 */
	protected function ImageAllocate() {
		// Cleanup
		if (!empty($this->im)) {
			imagedestroy($this->im);
		}

		$this->im = imagecreatetruecolor( $this->width, $this->height );

		// Background color
		$this->GdBgColor = imagecolorallocatealpha( $this->im, 1, 2, 3, 125 );
		imagefilledrectangle( $this->im, 0, 0, $this->width, $this->height, $this->GdBgColor );
		imagecolortransparent( $this->im, $this->GdBgColor );
		
		// Turn on antialiasing for lines
		imagealphablending( $this->im, true );
		
		// we should probably be checking that $_SESSION is set before using it...
		if( isset($_SESSION['color'] ) ) {
			$fcolor		   = $_SESSION['color'][mt_rand(3,4)];
		} else {
			$fcolor = array( 255, 255, 255 );
		}
		$this->GdFgColor = imagecolorallocate( $this->im, $fcolor[0], $fcolor[1], $fcolor[2] );
		$this->Color = array( $fcolor[0], $fcolor[1], $fcolor[2] );
		
		$this->Black = imagecolorallocate( $this->im, 0, 0, 0 );
	}

	/**
	 * Text generation
	 *
	 * @return string Text
	 */
	protected function GetCaptchaText() {
		$text = $this->GetDictionaryCaptchaText();
		if (!$text) {
			$text = $this->GetRandomCaptchaText();
		}
		return $text;
	}

	/**
	 * Random text generation
	 *
	 * @return string Text
	 */
	protected function GetRandomCaptchaText($length = null) {
		if (empty($length)) {
			$length = rand($this->minWordLength, $this->maxWordLength);
		}

		$words  = "abcdefghijmnopqrstvwyz";
		$vocals = "aeiou";

		$text  = "";
		$vocal = rand(0, 1);
		for ($i=0; $i<$length; $i++) {
			if ($vocal) {
				$text .= substr($vocals, mt_rand(0, 4), 1);
			} else {
				$text .= substr($words, mt_rand(0, 22), 1);
			}
			$vocal = !$vocal;
		}
		return $text;
	}

	/**
	 * Random dictionary word generation
	 *
	 * @param boolean $extended Add extended "fake" words
	 * @return string Word
	 */
	function GetDictionaryCaptchaText($extended = false) {
		if (empty($this->wordsFile)) {
			return false;
		}

		// Full path of words file
		if (substr($this->wordsFile, 0, 1) == '/') {
			$wordsfile = $this->wordsFile;
		} else {
			$wordsfile = $this->resourcesPath.'/'.$this->wordsFile;
		}

		if (!file_exists($wordsfile)) {
			return false;
		}

		$fp	 = fopen($wordsfile, "r");
		$length = strlen(fgets($fp));
		if (!$length) {
			return false;
		}
		$line   = rand(1, (filesize($wordsfile)/$length)-2);
		if (fseek($fp, $length*$line) == -1) {
			return false;
		}
		$text = trim(fgets($fp));
		fclose($fp);


		/** Change ramdom volcals */
		if ($extended) {
			$text   = preg_split('//', $text, -1, PREG_SPLIT_NO_EMPTY);
			$vocals = array('a', 'e', 'i', 'o', 'u');
			foreach ($text as $i => $char) {
				if (mt_rand(0, 1) && in_array($char, $vocals)) {
					$text[$i] = $vocals[mt_rand(0, 4)];
				}
			}
			$text = implode('', $text);
		}

		return $text;
	}

	// Horizontal line insertion
	protected function WriteLine() {

		$x1 = $this->width*.15;
		$x2 = $this->textFinalX-rand(0,$this->textFinalX*0.25);
		$y1 = rand($this->height*.15, $this->height*.75);
		$y2 = rand($this->height*.30, $this->height*.75);
		$width = $this->lineWidth/2;
		
		$d = rand(1,13);
		$dx = ($x2-$x1)/$d;
		$dy = ($y2-$y1)/$d;
		$m = ($y2-$y1)/($x2-$x1);
		
		$length = sqrt(($x2-$x1)^2+($y2-$y1)^2);

		for ($l = 0; $l <= $d; $l++) {
			if( isset( $color ) ) { imagecolordeallocate( $this->im, $color ); }
			$color = imagecolorallocate( $this->im, spit($this->Color[0]-rand(25,125)), spit($this->Color[1]-rand(25,125)), spit($this->Color[2]-rand(25,125)) );
			for ($i = $width*-1; $i <= $width; $i++) {
				imagelinethick($this->im, $x1+($dx*$l), $y1+($dy*$l)+$i, $x1+($dx*($l+1)), $y1+($dy*($l+1))+$i, $color, 2);
			}
		}
	}

	// Text insertion
	protected function WriteText($text, $fontcfg = array()) {
		if (empty($fontcfg)) {
			// Select the font configuration
			$fontcfg  = $this->fonts[array_rand($this->fonts)];
		}

		// Full path of font file
		$fontfile = $this->resourcesPath.$fontcfg['font'];
		
		/** Increase font-size for shortest words: 9% for each glyph missing */
		$lettersMissing = $this->maxWordLength-strlen($text);
		$fontSizefactor = 1+($lettersMissing*0.09);

		// Text generation (char by char)
		$x	  = $this->width/2-strlen($text)*$fontcfg['spacing']/2;
		$y	  = round(($this->height*27/40));
		$length = strlen($text);
		for ($i=0; $i<$length; $i++) {
			$degree   = rand($this->maxRotation*-1, $this->maxRotation);
			$fontsize = rand($fontcfg['minSize'], $fontcfg['maxSize'])*$fontSizefactor;
			$letter   = substr($text, $i, 1);
			if( isset( $color ) ) { imagecolordeallocate( $this->im, $color ); }
			$color = imagecolorallocate( $this->im, spit($this->Color[0]-rand(5,50)), spit($this->Color[1]-rand(5,50)), spit($this->Color[2]-rand(5,50)) );
			
			$coords = imagettftext($this->im, $fontsize, $degree,
				$x, $y,
				$color, $fontfile, $letter);
			$x += $fontcfg['spacing'];
			if( $letter == 'm' || $letter == 'w' ) {
				$x += $fontcfg['spacing']/2;
			}
		}

		$this->textFinalX = $x;
	}

	// Wave filter
	protected function WaveImage() {
		// X-axis wave generation
		$xp = $this->Xperiod*rand(1,3);
		$k = rand(0, 100);
		for ($i = 0; $i < ($this->width); $i++) {
			imagecopyresampled($this->im, $this->im,
				$i-1, sin($k+$i/$xp) * $this->Xamplitude,
				$i-1, sin($k+$i/$xp) * $this->Xamplitude,
				$i, 0, 1, $this->height);
			imagealphablending($this->im,true);
		}

		// Y-axis wave generation
		$k = rand(0, 100);
		$yp = $this->Yperiod*rand(1,2);
		for ($i = 0; $i < ($this->height); $i++) {
			imagecopyresampled($this->im, $this->im,
				sin($k+$i/$yp) * $this->Yamplitude, $i-1,
				sin($k+$i/$yp) * $this->Yamplitude, $i-1,
				0, $i, $this->width, 1);
			imagealphablending($this->im,true);
		}
	}

	// Reduce the image to the final size
	protected function ReduceImage() {
		$imResampled = imagecreatetruecolor($this->width, $this->height);
		imagecopyresampled($imResampled, $this->im,
			0, 0, 0, 0,
			$this->width, $this->height,
			$this->width, $this->height
		);
		imagealphablending($this->im,true);
		imagedestroy($this->im);
		$this->im = $imResampled;
	}

	// File generation
	protected function WriteImage() {
		if ($this->imageFormat == 'png' && function_exists('imagepng')) {
			header("Content-type: image/png");
			imagecolortransparent($this->im,$this->GdBgColor);
			imagealphablending($this->im,true);
			imagepng($this->im);
		} else {
			header("Content-type: image/jpeg");
			imagejpeg($this->im, null, 80);
		}
	}

	// Cleanup
	protected function Cleanup() {
		imagedestroy($this->im);
	}
}

function spit( $num ) {
	return ( $num < 0 ? 42 : $num );
}

function imagelinethick($image, $x1, $y1, $x2, $y2, $color, $thick = 1)
{
    /* this way it works well only for orthogonal lines
    imagesetthickness($image, $thick);
    return imageline($image, $x1, $y1, $x2, $y2, $color);
    */
    if ($thick == 1) {
        return imageline($image, $x1, $y1, $x2, $y2, $color);
    }
    $t = $thick / 2 - 0.5;
    if ($x1 == $x2 || $y1 == $y2) {
        return imagefilledrectangle($image, round(min($x1, $x2) - $t), round(min($y1, $y2) - $t), round(max($x1, $x2) + $t), round(max($y1, $y2) + $t), $color);
    }
    $k = ($y2 - $y1) / ($x2 - $x1); //y = kx + q
    $a = $t / sqrt(1 + pow($k, 2));
    $points = array(
        round($x1 - (1+$k)*$a), round($y1 + (1-$k)*$a),
        round($x1 - (1-$k)*$a), round($y1 - (1+$k)*$a),
        round($x2 + (1+$k)*$a), round($y2 - (1-$k)*$a),
        round($x2 + (1-$k)*$a), round($y2 + (1+$k)*$a),
    );
    imagefilledpolygon($image, $points, 4, $color);
    return imagepolygon($image, $points, 4, $color);
}

?>