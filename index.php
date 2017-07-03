<?php require_once('config'); ?>
<!DOCTYPE html>
<!--[if lt IE 7]><html lang="ru" class="lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html lang="ru" class="lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html lang="ru" class="lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="ru">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title><?php print($page_title); ?></title>
	<link rel="shortcut icon" href="http://samogon.online/images/favicon/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="http://samogon.online/images/favicon/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="http://samogon.online/images/favicon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="http://samogon.online/images/favicon/apple-touch-icon-114x114.png">
	
	<?php print($meta_tags); ?>
	<?php get_css($css); ?>
</head>
<body>
	<!--[if lt IE 9]>
	<script src="assets/ie/html5shiv/es5-shim.min.js"></script>
	<script src="assets/ie/html5shiv/html5shiv.min.js"></script>
	<script src="assets/ie/html5shiv/html5shiv-printshiv.min.js"></script>
	<script src="assets/ie/respond/respond.min.js"></script>
	<![endif]-->
	<?php include_once ('includes/header.php');?>
	<?php include_once ('includes/top_slide.php');?>
	<?php include_once ('includes/adv2.php');?>
	<?php include_once ('includes/order4.php');?>
	<?php include_once ('includes/what-better.php');?>
	<?php include_once ('includes/why_vodka_expensive.php');?>
	<?php include_once ('includes/barboter.php');?>
	<?php include_once ('includes/how_we_work.php');?>
	<?php include_once ('includes/certificates.php');?>
	<?php include_once ('includes/reviews.php');?>
	<?php include_once ('includes/contacts.php');?>
	<?php include_once ('includes/red_order_form.php');?>
	<?php include_once ('includes/footer.php');?>

	<?php get_js($js); //add all JS?>
	

	<script type="text/javascript">
		function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + cvalue + "; " + expires;
        }

        function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1);
                if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
            }
            return undefined;
        }

        function getRegisterMetrikaBehaviorEventAvailable(counterId, goalName) {
            if (getCookie('qGoal-' + goalName + '-' + counterId) === undefined) {
                return true;
            } else {
                return false;
            }
        }

        function reachGoalAndRemember(counterId, goalName, counter) {
            if (getCookie('qGoal-' + goalName + '-' + counterId) === undefined) {
                setCookie('qGoal-' + goalName + '-' + counterId, 1, 1)
                counter.reachGoal(goalName, null, function () {
                    console.log(goalName + '-' + counterId + ' throwed');
                });
            }
        }

        function getMetrikaLastTimeSpent() {
            var timeSpent = getCookie('qTimeSpent');
            if (timeSpent === undefined) {
                return 0;
            } else {
                return timeSpent;
            }
        }

        var startTimeSpent;

        $(document).ready(function () {
            startTimeSpent = new Date().getTime();
            $(window).unload(function () {
                var endTime = new Date().getTime();
                var timeSpent = Math.round((endTime - startTimeSpent) / 1000);
                var timeSpentOld = getCookie('qTimeSpent');
                if (timeSpentOld !== undefined) {
                    timeSpent = timeSpent + parseInt(timeSpentOld);
                }
                setCookie('qTimeSpent', timeSpent, 1);
            });
        });

        function registerVisitTimeGoal(counterId, eventName, secondsToFire) {
            qts = getMetrikaLastTimeSpent();
            if (qts < secondsToFire) {
                if (getRegisterMetrikaBehaviorEventAvailable(counterId, eventName)) {
                    setTimeout(function(){
                        reachGoalAndRemember(counterId,eventName,window['yaCounter'+counterId]);
                    },(secondsToFire-qts)*1000);
                }
            }
        }
	</script>
	
	<!-- Yandex.Metrika informer -->
	<a href="https://metrika.yandex.ru/stat/?id=45171699&amp;from=informer"
	target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/45171699/2_1_FFFFFFFF_EFEFEFFF_0_uniques"
	style="width:80px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (уникальные посетители)" class="ym-advanced-informer" data-cid="45171699" data-lang="ru" /></a>
	<!-- /Yandex.Metrika informer -->

	<!-- Yandex.Metrika counter -->
	<script type="text/javascript">
	    (function (d, w, c) {
	        (w[c] = w[c] || []).push(function() {
	            try {
	                w.yaCounter45171699 = new Ya.Metrika({
	                    id:45171699,
	                    clickmap:true,
	                    trackLinks:true,
	                    accurateTrackBounce:true
	                });
	            } catch(e) { }
	        });

	        var n = d.getElementsByTagName("script")[0],
	            s = d.createElement("script"),
	            f = function () { n.parentNode.insertBefore(s, n); };
	        s.type = "text/javascript";
	        s.async = true;
	        s.src = "https://mc.yandex.ru/metrika/watch.js";

	        if (w.opera == "[object Opera]") {
	            d.addEventListener("DOMContentLoaded", f, false);
	        } else { f(); }
	    })(document, window, "yandex_metrika_callbacks");
	</script>
	<noscript>
		<div>
			<img src="https://mc.yandex.ru/watch/45171699" style="position:fixed; bottom:0; left:-9999px;" alt="" />
		</div>
	</noscript>
	<!-- /Yandex.Metrika counter -->

	    

	<!-- Necessary copyright --><img src="assets\10fd6b9e\ga.htm?utmac=MO-12220535-3&amp;utmn=1836716772&amp;utmr=-&amp;utmp=%2F&amp;guid=ON"><p id="qnits_copyright"> &copy; 2016-2017</p><!-- /Necessary copyright -->

	
	

	<!-- Widgets -->
	<!-- /Widgets -->
	<!-- BEGIN JIVOSITE CODE {literal} -->
	<script type='text/javascript'>
	(function(){ var widget_id = 'lrCGRVukoz';var d=document;var w=window;function l(){
	var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
	<!-- {/literal} END JIVOSITE CODE -->
	</script>

	<!-- BEGIN JIVOSITE CODE {literal} -->
	<script type='text/javascript'>
	(function(){ var widget_id = 'lrCGRVukoz';var d=document;var w=window;function l(){
	var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
	<!-- {/literal} END JIVOSITE CODE -->
</body>
</html>
