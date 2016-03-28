<?php

include 'php/init.php';
include 'php/common.php';
include 'php/colors.php';

?><html>
	<head>
		<title>First Pastafarian Church</title>
		<link rel="stylesheet" type="text/css" href="/css/def.css.php">
		<link rel="stylesheet" type="text/css" href="/css/testimony.css.php">
	</head>
	<body>
		<h1>Testimony</h1>
		<h2>about the First Pastafarian Church of Norman, OK</h1>
		<p>
			"I'm not going to play there because it mocks my faith and the Creator of the universe"<br>
			&mdash; <a href="https://www.facebook.com/DjEdCrunk">Ed Crunk</a>, founder of <a href="http://www.dictionary.com/browse/hypocrite">Robotic Wednesdays</a>, all-around <a href="http://www.urbandictionary.com/define.php?term=stick%20in%20the%20mud">cool guy</a>
		</p>
		<p>
			"&#9733;&#9733;&#9733;&#9733;&#9733;"<br>
			&mdash; Shelby G
		</p>
		<p>
			"Perfect. No other words needed... R'Amen!"<br>
			&mdash; Michael S
		</p>
		<p>
			"I know you want to be here and I don't blame you."<br>
			&mdash; Thaddeus K 
		</p>
		<p>
			"This has to be a big joke." <a href="https://www.facebook.com/FirstPastafarian/posts/1157858457562520">&#128279;</a><br>
			&mdash; <a href="https://www.facebook.com/rean.lackey">Rean Henderson Lackey</a>, unfunny man
		</p>
		<p>
			"Definitely my favorite church in Norman ! (: looking forward to the next service."<br>
			&mdash; Michael S.
		</p>
		<p>
			"&#9733;&#9733;&#9733;&#9733;&#9733;"<br>
			&mdash; Zain W
		</p>
		<p>
			"you are clearly a FAGGOT!" and "You shall be served by the end of the week by a Deputy Sheriff." <a href="https://www.facebook.com/FirstPastafarian/photos/a.1149643235050709.1073741828.1144692382212461/1157820860899613/">&#128279;</a><br>
			&mdash;<a href="https://www.facebook.com/russell.reed.313">Russell Reed</a>, local <a href="https://en.wikipedia.org/wiki/Anus">bigot</a>
		</p>
		<p>
			"rAmen, it's about time! I've been asked if there is a pastafarian church in Oklahoma by multiple friends over the past few years. Now we need to get one up in Edmond!..."<br>
			&mdash; Gabriel R
		</p>
		<p>
			"If I can just touch his noodle I'll be cleansed" <a href="https://www.facebook.com/photo.php?fbid=1195926423751680&set=a.382279718449692.97618.100000030023624&type=1&theater">&#128279;</a><br>
			&mdash; Vincent C, believer
		</p>
		<p>
			"&#9733;&#9733;&#9733;&#9733;&#9733;"<br>
			&mdash; Greg P
		</p>
		<p>
			"No person shall disturb the peace of another by ... (4) Circulating literature which casts ridicule upon any deity or religion, which in its common acceptance is calculated to cause an assault, battery, or other breach of the peace" <a href="https://www.municode.com/library/ok/norman/codes/code_of_ordinances?nodeId=COOR_CH15OF_ARTVOFAGPE_S15-503DIPE">&#128279;</a><br>
			&mdash; City of Norman Code of Ordinances Section 15-503, Ordinance Number 0-7273-56
		</p>
		<p>
			"Freedom of religion means you are free to worship whatever the hell you want...including a flying spaghetti monster!!!! YAYYYYY for freedom!"<br>
			&mdash; Angylee P
		</p>
		<p>
			"you guys worship noodles that's fucked"<br>
			&mdash; Brandon P, who has since deleted his blasphemy
		</p>
		<p>
			"It is foretold by Christ's prophet that two comets will collide in the sky. Then you will see the cross. Don't be afraid but pray to Jesus for mercy." <a href="https://www.facebook.com/FirstPastafarian/posts/1236141289734236">&#128279;</a><br>
			&mdash; <a href="https://www.facebook.com/sciemniak000">Przemek Indyka</a>, prophet
		</p>
		<p>
			"&#9733;&#9733;&#9733;&#9733;&#9733;"<br>
			&mdash; Tyler B
		</p>
		<p>
			"You have got to be kidding me!" <br>
			&mdash; Sally L, confused grandmother
		</p>
		<p>
			"Someone please tell me how I ended up in a Pastafarian church listening to a guy beat box into a didgeridoo." <!--2016/02/23--> <a href="https://www.facebook.com/FirstPastafarian/notifications/?section=activity_feed&subsection=checkin&ref=notif&target_story=S%3A_I100005716787237%3A395823287284894">&#128279;</a><br>
			&mdash; Taylor D, while visiting the church for a fundraiser benefitting two local newlyweds seeking funds to fully legalize their union
		<p>
		</p>
			"I've never been more envious of someone else's life"<br>
			&mdash; Nathan E, in response to Taylor D's enviable life of listening to beatboxering digeridooers
		</p>
		<!--
		</p>
			"" <a href="#">&#128279;</a><br>
			&mdash; , 
		</p>
		-->
		<a class="block" href="/">back &raquo;</a>

		<div id="stage">
			<noscript><img src="img/fsm-small-r.png" /></noscript>
		</div>

		<script src="vendor/pixi.min.js"></script>
		<script>
			var renderer = PIXI.autoDetectRenderer(800, 600, { transparent: true });
			document.getElementById("stage").appendChild(renderer.view);

			// create the root of the scene graph
			var stage = new PIXI.Container();

			var FSM = PIXI.Sprite.fromImage('img/fsm.png');
			FSM.position.x = (renderer.width / 2) - 315;
			FSM.position.y = 10;
			stage.addChild(FSM);

			var blur = new PIXI.filters.BlurFilter();

			FSM.filters = [blur];

			var count = 0;

			requestAnimationFrame(animate);

			function animate() {

			    count += 0.005;

			    var blurAmount = Math.cos(count) ;

			    blur.blur = 20 * (blurAmount);
			    renderer.render(stage);
			    requestAnimationFrame( animate );
			}
		</script>
	</body>
</html>