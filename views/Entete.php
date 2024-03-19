<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" context="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Header</title>
    <meta name="description" content="">

    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <style>
        /* ----- General Styling ----- */

body {
    font-family: Arial, sans-serif;
}

.container, #latest_works, #bottom_content, #download {
    margin: auto;
    width: 1000px;
}

.bold_text {
    font-weight: bold;
}

.blue_text {
    color: #2aacc8;
    font-size: 15px;
}

/* ----- General Styling ----- */

/* ----- Header Styling ----- */

#header {
    background: #e8ebf1;
    height: 120px;
}

h1 {
    float: left;
    margin-top: 37px;
}

h1 a {
    background: url(../images/logo.png) no-repeat;
    display: block;
    height: 37px;
    text-indent: -9999px;
    width: 148px;
}

/* ----- Header Styling ----- */

/* ----- Main Navigation Styling ----- */

#main_menu {
    float: right;
    margin-top: 54px;
}

.first_list {
    float: left;
    margin: 0 14px;
}

.main_menu_first {
    color: #000;
    font-size: 13px;
    font-weight: bold;
    padding: 8px 8px;
    text-transform: uppercase;
}

.main_menu_first:hover {
    border-top: 5px solid #2aacc8;
}

.with_dropdown {
    position: relative;
}

.with_dropdown li a {
    display: block;
}

.with_dropdown ul {
    background: #fff;
    border-bottom: 5px solid #2aacc8;
    padding: 12px 0;
    position: absolute;
    top: 24px;
    visibility: hidden;
    width: 197px;
}

.first_list:hover.first_list ul {
    visibility: visible;
}

.with_dropdown .main_menu_first {
    background: url(../images/arrow_down.png) no-repeat 92%;
    padding-right: 23px;
}

.with_dropdown:hover .main_menu_first {
    background: #fff url(../images/arrow_down.png) no-repeat 92%;
    border-top: 5px solid #2aacc8;
    color: #2aacc8;
}

.second_list {
    margin: 0 5px;
    padding: 10px;
}

.second_list_border {
    border-bottom: 1px solid #e7e7e7;
}

.main_menu_second {
    color: #000;
    font-size: 13px;
    text-transform: capitalize;
}

.main_menu_second:hover {
    color: #2aacc8;
}

.main_current {
    border-top: 5px solid #2aacc8;
}

/* ----- Main Navigation Styling ----- */

/* ----- Slideshow Styling ----- */

#slideshow_area {
    background: #81e4ed url(../images/banner_shadow.png) repeat-x;
    border-top: 1px solid #6ec2ca;
    padding: 19px 0 28px 0;
}

#mid_content {
    border-bottom: 1px solid #d9d9d9;
    background: #e8ebf1;
    height: 300px;
}

#slideshow_pagination {
    margin: 10px auto;
    width: 160px;
}

#slideshow_pagination li {
    float: left;
    margin: 0 9px;
}

#slideshow_pagination a {
    background: url(../images/grey_button.png) no-repeat;
    display: block;
    height: 14px;
    width: 14px;
}

#slideshow_pagination a.current {
    background: url(../images/white_button.png) no-repeat;
}

/* ----- Slideshow Styling ----- */

/* ----- Home Mid Content Styling ----- */

.mid_content_info {
    float: left;
    font-size: 13px;
    margin-top: 60px;
    width: 220px;
}

.mid_content_info h2 {
    font-size: 15px;
    font-weight: bold;
    height: 28px;
    margin-bottom: 15px;
    padding: 12px 0 0 59px;
}

.mid_content_info p {
    color: #363636;
    line-height: 20px;
    margin-bottom: 22px;
}

.mid_content_info a {
    color: #2aacc8;
}

.mid_content_info a img {
    margin: 0 8px 1px 0;
}

.mid_content_info a:hover {
    text-decoration: underline;
}

.mid_content_space {
    margin-right: 40px;
}

#clean {
    background: url(../images/pen_icon.png) no-repeat left;
}

#responsive {
    background: url(../images/screen_icon.png) no-repeat left;
}

#fully {
    background: url(../images/layer_icon.png) no-repeat left;
}

#ready {
    background: url(../images/paperplane_icon.png) no-repeat left;
}

#latest_works {
    clear: left;
}

#latest_works h3 {
    background: url(../images/cursor_icon.png) no-repeat left;
    float: left;
    font-size: 15px;
    font-weight: bold;
    height: 16px;
    margin: 19px 0 15px 0;
    padding: 8px 0 0 38px;
}

#carousel_nav {
    float: right;
    margin-top: 20px;
}

#carousel_nav a {
    margin-left: 6px;
}

#carousel_wrapper {
    border-top: 1px solid #dfe1e5;
    border-bottom: 1px solid #dfe1e5;
    clear: left;
    height: 220px;
}

#carousel_wrapper li {
    float: left;
    margin: 30px 15px;
}

/* ----- Carousel and Portfolio Styling ----- */

#carousel_wrapper li, #portfolio_list li {
    height: 160px;
    position: relative;
    width: 220px;
}

#carousel_wrapper li a img, #portfolio_list li a img {
    bottom: 0;
    position: absolute;
    visibility: hidden;
}

#carousel_wrapper li:hover a img, #portfolio_list li:hover a img {
    visibility: visible;
}

#work01 {
    background: url(../images/latest_work01.jpg) no-repeat;
}

#work02 {
    background: url(../images/latest_work02.jpg) no-repeat;
}

#work03 {
    background: url(../images/latest_work03.jpg) no-repeat;
}

#work04 {
    background: url(../images/latest_work04.jpg) no-repeat;
}

#work05 {
    background: url(../images/latest_work05.jpg) no-repeat;
}

#work06 {
    background: url(../images/latest_work06.jpg) no-repeat;
}

#work07 {
    background: url(../images/latest_work07.jpg) no-repeat;
}

#work08 {
    background: url(../images/latest_work08.jpg) no-repeat;
}

#work09 {
    background: url(../images/latest_work09.jpg) no-repeat;
}

#work10 {
    background: url(../images/latest_work10.jpg) no-repeat;
}

#work11 {
    background: url(../images/latest_work11.jpg) no-repeat;
}

#work12 {
    background: url(../images/latest_work12.jpg) no-repeat;
}

#work13 {
    background: url(../images/latest_work13.jpg) no-repeat;
}

#work14 {
    background: url(../images/latest_work14.jpg) no-repeat;
}

#work15 {
    background: url(../images/latest_work15.jpg) no-repeat;
}

#work16 {
    background: url(../images/latest_work16.jpg) no-repeat;
}

/* ----- Carousel and Portfolio Styling ----- */


#testimonials {
    clear: left;
    float: left;
    width: 430px;
}

#testimonials h3 {
    background: url(../images/speechcloud_icon.png) no-repeat left;
    font-size: 15px;
    font-weight: bold;
    height: 18px;
    margin: 19px 0 15px 0;
    padding: 5px 0 0 38px;
}

#testimonials p {
    color: #363636;
    font-size: 14px;
    line-height: 24px;
}

.testimonial_name {
    font-style: italic;
    font-weight: bold;
}

#clients {
    float: right;
    margin-bottom: 40px;
}

#clients h3 {
    background: url(../images/people_icon.png) no-repeat left;
    font-size: 15px;
    font-weight: bold;
    height: 16px;
    margin: 19px 0 15px 0;
    padding: 4px 0 0 38px;
}

#clients ul {
    background: #e8ebf1;
    height: 200px;
    width: 480px;
}

#clients img {
    float: left;
    margin: 1px;
}

#download {
    background: #e8fcfe;
    border: 1px solid #81e4ed;
    clear: both;
    height: 78px;
    padding: 30px 30px;
    width: 940px;
}

#download p {
    color: #363636;
    float: left;
    font-size: 16px;
    line-height: 26px;
    width: 608px;
}

#download a {
    background: url(../images/download_button.png) no-repeat;
    display: block;
    color: #0d0707;
    font-size: 18px;
    font-weight: bold;
    float: right;
    height: 42px;
    margin: 8px 8px 0 0;
    padding: 22px 0 0 72px;
    width: 172px;
}

#download a:hover {
    color: #fff;
}

/* ----- Home Mid Content Styling ----- */

/* ----- Portfolio Content Styling ----- */

#portfolio_area {
    background: url(../images/banner_shadow.png) repeat-x;
    border-top: 1px solid #d9d9d9;
    padding-top: 38px;
}

#portfolio {
    background: url(../images/paintbrush_icon.png) no-repeat;
    font-size: 15px;
    font-weight: bold;
    height: 19px;
    margin-bottom: 12px;
    padding: 6px 0 0 40px;
}

#portfolio_menu {
    border-bottom: 1px solid #dfe1e5;
    border-top: 1px solid #dfe1e5;
    margin-bottom: 25px;
    padding-bottom: 20px;
}

#portfolio_menu ul {
    padding: 20px 0;
}

#portfolio_menu li, #portfolio_list li {
    float: left;
}

#portfolio_menu li {
    margin-right: 2px;
}

#portfolio_menu a {
    color: #000;
    font-size: 14px;
    padding: 7px 18px;
}

#portfolio_menu a:hover {
    background: #81e4ed;
}

.portfolio_menu_current {
    background: #81e4ed;
}

#portfolio_list {
    height: 760px;
}

#portfolio_list li {
    margin: 15px 15px;
}

#portfolio_pagination {
    border-top: 1px solid #dfe1e5;
    clear: left;
    margin-top: 30px;
    padding: 25px 0;
}

#portfolio_pagination ul {
    margin: auto;
    width: 233px;
}

#portfolio_pagination li {
    float: left;
    margin: 0 2px;
}

#portfolio_pagination a {
    color: #000;
    display: block;
    font-size: 14px;
    padding: 6px 9px;
}

#portfolio_pagination a:hover {
    background: #81e4ed;
}

a#pagination_next, a#pagination_end {
    background: #e8ebf1;
}

a#pagination_next:hover, a#pagination_end:hover {
    background: #bfc1c6;
}

#pagination_end {
    margin-left: 22px;
}

.pagination_current {
    background: #81e4ed;
}

/* ----- Portfolio Content Styling ----- */

/* ----- Contact Content Styling ----- */

#contact_area {
    background: url(../images/banner_shadow.png) repeat-x;
    border-top: 1px solid #d9d9d9;
    padding-top: 38px;
}

#contact {
    background: url(../images/envelope_icon.png) no-repeat;
    font-size: 15px;
    font-weight: bold;
    height: 15px;
    margin: 6px 0 17px 0;
    padding: 2px 0 0 40px;
}

#contact_info {
    border-top: 1px solid #dfe1e5;
    padding-top: 10px;
}

#contact_info_left {
    float: left;
    margin: 27px 0 33px 0;
    width: 574px;
}

#contact_info p {
    font-size: 14px;
    line-height: 16px;
    margin-bottom: 20px;
}

#contact_info_left p a:hover {
    text-decoration: underline;
}

#contact_info_right {
    float: right;
    margin-top: 30px;
}

#location_map {
    background: #e8fcfe;
    border: 1px solid #81e4ed;
    margin: 0 20px 36px 0;
    padding: 20px;
}

#location_map h3 {
    font-size: 14px;
    font-weight: bold;
    margin-bottom: 20px;
}

#location_map img {
    border: 5px solid #fff;
}

#address h3 {
    font-size: 15px;
    font-weight: bold;
    margin-bottom: 20px;
}

#address p {
    color: #363636;
}

/* ----- Contact Content Styling ----- */

/* ----- Form Styling ----- */

#contact_form {
    width: 480px;
}
	 
#contact_form li {
    font-size: 14px;
    padding: 2px 0px;
}
	 
#contact_form label {
    display: block;
    margin: 12px 0;
}
         
#contact_form input {
    height: 35px;
}

#contact_form input:focus, #contact_form textarea:focus {
    border: 1px solid #2aacc8;
}

#contact_form input, #contact_form textarea {
    border: 1px solid #b4bac5;
}

#contact_form input[type="submit"] {
    background: url(../images/submit_button.png) no-repeat;
    border: none;
    cursor: pointer;
    font-size: 18px;
    font-weight: bold;
    height: 64px;
    margin-top: 20px;
    padding: 0 0 6px 30px;
    width: 160px;
}

#contact_form input[type="submit"]:hover {
    color: #fff;
}

/* ----- Form Styling ----- */

/* ----- Footer Styling ----- */

#footer {
    background: #e8ebf1;
    border-top: 1px solid #d9d9d9;
    clear: both;
    height: 320px;
    margin-top: 40px;
}

#footer p, #footer a {
    color: #363636;
    font-size: 14px;
}

#footer h4 {
    font-size: 15px;
    font-weight: bold;
    text-transform: uppercase;
    margin: 0 0 21px 0;
}

.footer_info {
    float: left;
    margin: 32px 0 40px 0;
}

#footer_about, #footer_explore, #footer_browse {
    margin-right: 64px;
}

#footer_about {
    width: 238px;
}

#footer_about p, #footer_contact p, #copyright {
    line-height: 17px;
}

#footer_explore li, #footer_browse li {
    margin: 12px 0;
}

#footer_explore li a, #footer_browse li a {
    text-transform: capitalize;
}

#footer_explore li a:hover, #footer_browse li a:hover {
    color: #2aacc8;
}

#footer_connect {
    float: right;
    width: 213px;
}

#footer_connect h4 {
    margin-left: 24px;
}

#footer_connect a {
    display: block;
    float: left;
    height: 51px;
    margin: 0 0 10px 18px;
    text-indent: -9999px;
    width: 53px;
}

#facebook {
    background: url(../images/facebook_icon.png) no-repeat;
}

#dribbble {
    background: url(../images/dribbble_icon.png) no-repeat;
}

#pinterest {
    background: url(../images/pinterest_icon.png) no-repeat;
}

#linkedin {
    background: url(../images/linkedin_icon.png) no-repeat;
}

#skype {
    background: url(../images/skype_icon.png) no-repeat;
}

#sharethis {
    background: url(../images/sharethis_icon.png) no-repeat;
}

p#copyright {
    clear: both;
    float: left;
    font-size: 13px;
}

#footer_logo {
    background: url(../images/logo.png) no-repeat;
    display: block;
    float: right;
    height: 37px;
    text-indent: -9999px;
    width: 148px;
}

/* ----- Footer Styling ----- */
html {
  position: relative;
  min-height: 100%;
}
.mbr-transparent {
  opacity: 0;
  filter: alpha(opacity=0);
}
.mbr-fullscreen {
  width: 100%;
}
.mbr-background-video,
.mbr-background-video-preview {
  bottom: 0;
  left: 0;
  overflow: hidden;
  position: absolute;
  right: 0;
  top: 0;
}
.mbr-parallax-background,
.mbr-background {
  background-attachment: fixed !important;
  background-position: 50% 0;
  background-repeat: no-repeat;
  background-size: cover !important;
}
.mbr-hidden-scrollbar .mbr-parallax-background {
  background-size: auto 130%;
}
.mobile .mbr-parallax-background {
  background-attachment: scroll !important;
}
.mbr-background {
  background-attachment: scroll !important;
}
.mbr-nav-toggle {
  display: none;
}
.menu-1 {
  -webkit-transition: background 0.5s cubic-bezier(0.7, 0.01, 0.3, 1) 0.15s;
  -o-transition: background 0.5s cubic-bezier(0.7, 0.01, 0.3, 1) 0.15s;
  transition: background 0.5s cubic-bezier(0.7, 0.01, 0.3, 1) 0.15s;
  padding-left: 20px;
  padding-right: 20px;
  position: absolute;
  width: 100%;
  z-index: 100;
}
.menu-1 .container {
  padding: 0;
}
.menu-1 .row > div {
  height: 93px;
}
.menu-1 .brand {
  float: left;
  width: 30%;
}
.menu-1 nav {
  float: right;
  width: 70%;
}
.menu-1 .brand {
  position: relative;
}
.menu-1 .brand a {
  font-size: 21px;
  font-weight: bold;
  line-height: 92px;
}
.menu-1 .brand a:hover {
  text-decoration: none;
}
.menu-1 .brand a img {
  height: 40px;
  position: relative;
  top: 26px;
  vertical-align: top;
  margin-right: 5px;
}
.menu-1 .brand .mbr-nav-toggle {
  -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
  font-family: "Glyphicons Halflings";
  font-size: 24px;
  font-style: normal;
  font-weight: normal;
  line-height: 1;
  position: absolute;
  right: 0;
  top: 34px;
  cursor: pointer;
}
.menu-1 .brand .mbr-nav-toggle:before {
  content: "\e236";
}
.menu-1 .brand .mbr-nav-toggle:focus {
  outline: none;
}
.menu-1 nav {
  position: relative;
  top: 22px;
  vertical-align: top;
}
.menu-1 nav li a {
  font-size: 14px;
  line-height: 22px;
}
.menu-1 .brand a {
  color: #4c6972;
}
.menu-1 .brand .mbr-nav-toggle {
  color: #4c6972;
}
.menu-1 nav li a,
.menu-1 nav li a:hover,
.menu-1 nav li a:focus {
  color: #4c6972;
}
.menu-1 nav li a:after {
  background: #4c6972;
}
.menu-1.dark .brand a {
  color: #ffffff;
}
.menu-1.dark .brand .mbr-nav-toggle {
  color: #ffffff;
}
.menu-1.dark nav li a,
.menu-1.dark nav li a:hover,
.menu-1.dark nav li a:focus {
  color: #ffffff;
}
.menu-1.dark nav li a:after {
  background: #ffffff;
}
.menu-1.static {
  background-color: #fff;
  position: relative;
}
.menu-1.static .brand a {
  color: #4c6972;
}
.menu-1.static .brand .mbr-nav-toggle {
  color: #4c6972;
}
.menu-1.static nav li a,
.menu-1.static nav li a:hover,
.menu-1.static nav li a:focus {
  color: #4c6972;
}
.menu-1.static nav li a:after {
  background: #f97352;
}
.menu-1.static.dark,
.menu-1.is-fixed.dark {
  background-color: #444444;
}
.menu-1.static.dark .brand a,
.menu-1.is-fixed.dark .brand a {
  color: #eeeeee;
}
.menu-1.static.dark .brand .mbr-nav-toggle,
.menu-1.is-fixed.dark .brand .mbr-nav-toggle {
  color: #eeeeee;
}
.menu-1.static.dark nav li a,
.menu-1.static.dark nav li a:hover,
.menu-1.static.dark nav li a:focus,
.menu-1.is-fixed.dark nav li a,
.menu-1.is-fixed.dark nav li a:hover,
.menu-1.is-fixed.dark nav li a:focus {
  color: #eeeeee;
}
.menu-1.static.dark nav li a:after,
.menu-1.is-fixed.dark nav li a:after {
  background: #f97352;
}
.menu-1.static.mbr-fixed-top {
  position: absolute;
}
.menu-1.static.mbr-fixed-top + * {
  top: 93px;
  margin-bottom: 93px;
}
.menu-1.is-fixed {
  background-color: transparent;
  position: fixed !important;
  top: 0;
}
.menu-1.is-fixed .brand a {
  color: #4c6972;
}
.menu-1.is-fixed .brand .mbr-nav-toggle {
  color: #4c6972;
}
.menu-1.is-fixed nav li a,
.menu-1.is-fixed nav li a:hover,
.menu-1.is-fixed nav li a:focus {
  color: #4c6972;
}
.menu-1.is-fixed nav li a:after {
  background: #f97352;
}
.menu-1.is-fixed,
.menu-1.is-fixed .container,
.menu-1.is-fixed .row,
.menu-1.is-fixed .row > div {
  height: 1px;
}
.menu-1.is-fixed .brand {
  -webkit-animation: menu-1 0.45s linear 0s;
  -o-animation: menu-1 0.45s linear 0s;
  animation: menu-1 0.45s linear 0s;
}
.menu-1.is-fixed .brand a {
  display: none;
}
@-webkit-keyframes menu-1 {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
@-o-keyframes menu-1 {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
@keyframes menu-1 {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
.menu-1.is-fixed .brand .mbr-nav-toggle {
  opacity: 0.7;
  filter: alpha(opacity=70);
  -webkit-transition: opacity 0.2s ease-in-out 0s;
  -o-transition: opacity 0.2s ease-in-out 0s;
  transition: opacity 0.2s ease-in-out 0s;
  background-color: rgba(68, 68, 68, 0.8);
  color: #fff;
  margin-top: -14px;
  padding: 10px;
  z-index: 100;
}
.desktop .menu-1.is-fixed .brand .mbr-nav-toggle:hover {
  opacity: 1;
  filter: alpha(opacity=100);
  background-color: #252525;
}
.menu-1.is-fixed.dark {
  background-color: transparent;
}
.menu-1.is-fixed.static {
  background-color: #fff;
}
.menu-1.is-fixed.static.dark {
  background-color: #444444;
}
.menu-1.is-fixed .brand,
.menu-1.collapsed .brand,
.menu-1.nav-collapsed .brand {
  width: 100%;
}
.menu-1.is-fixed nav,
.menu-1.collapsed nav,
.menu-1.nav-collapsed nav {
  display: none;
}
.menu-1.is-fixed .mbr-nav-toggle,
.menu-1.collapsed .mbr-nav-toggle,
.menu-1.nav-collapsed .mbr-nav-toggle {
  display: block !important;
}
.menu-1.mbr-nav-visible {
  position: absolute !important;
}
.menu-1.mbr-nav-visible .brand .mbr-nav-toggle {
  opacity: 1;
  filter: alpha(opacity=100);
  -webkit-transition: none;
  -o-transition: none;
  transition: none;
  background-color: transparent !important;
  color: #fff;
  z-index: 100;
}
.menu-1.mbr-nav-visible .brand .mbr-nav-toggle:before {
  content: "\e014";
}
.menu-1.mbr-nav-visible nav {
  top: 0;
  left: 0;
  display: table;
  position: fixed;
  background-color: rgba(76, 105, 114, 0.9);
  width: 100%;
  -webkit-animation: menu-1-nav 0.3s linear 0s;
  -o-animation: menu-1-nav 0.3s linear 0s;
  animation: menu-1-nav 0.3s linear 0s;
}
@-webkit-keyframes menu-1-nav {
  0% {
    opacity: 0;
    filter: alpha(opacity=0);
  }
  100% {
    opacity: 1;
    filter: alpha(opacity=100);
  }
}
@-o-keyframes menu-1-nav {
  0% {
    opacity: 0;
    filter: alpha(opacity=0);
  }
  100% {
    opacity: 1;
    filter: alpha(opacity=100);
  }
}
@keyframes menu-1-nav {
  0% {
    opacity: 0;
    filter: alpha(opacity=0);
  }
  100% {
    opacity: 1;
    filter: alpha(opacity=100);
  }
}
.menu-1.mbr-nav-visible nav ul {
  display: table-cell;
  float: none !important;
  position: relative;
  top: -27px;
  vertical-align: middle;
  width: 100%;
}
@media (max-width: 480px) {
  .menu-1.mbr-nav-visible nav ul {
    top: -22px;
  }
}
.menu-1.mbr-nav-visible nav ul li {
  display: block;
  float: none;
  text-align: center;
}
.menu-1.mbr-nav-visible nav ul li a {
  border: 2px solid transparent;
  color: #fff !important;
  display: inline-block;
  font-size: 25px;
  font-weight: bold;
  letter-spacing: 6px;
  line-height: 48px;
  padding-left: 30px;
  padding-right: 30px;
}
.menu-1.mbr-nav-visible nav ul li a:hover {
  border-color: #fff;
  color: #fff !important;
}
.menu-1.mbr-nav-visible nav ul li a:before {
  content: "";
  display: inline-block;
  height: 1px;
  width: 4px;
}
.menu-1.mbr-nav-visible nav ul li a:after {
  display: none;
}
@media (max-width: 480px) {
  .menu-1.mbr-nav-visible nav ul li a {
    font-size: 20px;
    line-height: 34px;
    padding-left: 25px;
    padding-right: 25px;
  }
}
.menu-1.mbr-nav-visible nav ul li.active a {
  border-color: transparent;
  color: rgba(255, 255, 255, 0.6) !important;
  cursor: default;
}
.menu-1.mbr-nav-visible nav ul li:last-of-type:after {
  width: 36px;
  height: 3px;
  background: #fff;
  content: "";
  display: block;
  left: 50%;
  margin-left: -18px;
  position: relative;
  top: 25px;
}
@media (max-width: 480px) {
  .menu-1.mbr-nav-visible nav ul li:last-of-type:after {
    top: 20px;
  }
}
.menu-1.mbr-nav-visible.dark nav {
  background: rgba(249, 115, 82, 0.95);
}
.content-1 {
  overflow: hidden;
  padding: 0 20px;
  position: relative;
  text-align: center;
}
.content-1 .container {
  padding: 57px 0 79px;
  position: relative;
  z-index: 3;
}
.content-1 h2 {
  line-height: 1.5em;
  margin: 0;
  padding: 26px 0 4px;
}
.content-1 h2 + h2 {
  margin-top: -31px;
}
.content-1 p {
  color: #777;
  font-size: 17px;
  line-height: 27px;
  margin-bottom: 0;
  padding-bottom: 10px;
  padding-top: 29px;
  position: relative;
  text-align: left;
}
.content-1 p + p {
  margin-top: -10px;
  padding-top: 0;
}
.content-1 h2 + p {
  padding-top: 20px;
}
.content-1 .group {
  margin-top: 0;
  padding: 36px 0 14px;
}
@media (max-width: 530px) {
  .content-1 .group .btn {
    display: block;
  }
  .content-1 .group .btn + .btn {
    margin: 12px 0 0;
  }
}
@media (min-width: 531px) {
  .content-1 .group {
    line-height: 67px;
    padding: 29px 0 9px;
  }
  .content-1 .group .btn {
    margin-right: 10px;
    position: relative;
    left: 5px;
  }
}
.content-1 div + .group,
.content-1 h2 + .group,
.content-1 p + .group {
  padding-top: 20px;
}
@media (max-width: 530px) {
  .content-1 div + .group,
  .content-1 h2 + .group,
  .content-1 p + .group {
    padding-top: 27px;
  }
}
.content-1 .row > div {
  display: block;
  float: none;
  margin-left: auto;
  margin-right: auto;
}
@media (min-width: 768px) {
  .content-1.left {
    text-align: left;
  }
  .content-1.left .row > div {
    margin-left: 0;
  }
  .content-1.left p:before {
    left: 0;
    margin-left: 0;
  }
}
.content-1.dark {
  background: #3c3c3c;
  color: #fff;
}
.content-1.dark p {
  color: #fff;
}
.content-1.dark p:before {
  background: #fff;
}
.content-1.dark .btn-default {
  border-color: #fff;
  color: #fff;
}
.content-1.dark .btn-default:hover,
.content-1.dark .btn-default:focus,
.content-1.dark .btn-default.focus,
.content-1.dark .btn-default:active,
.content-1.dark .btn-default.active,
.open > .dropdown-toggle.content-1.dark .btn-default {
  background-color: #fff;
  border-color: #fff;
  color: #252525;
}
@media (min-width: 768px) {
  .content-1.extended {
    padding: 0 5px;
  }
}
.content-1.extended .container {
  padding: 93px 0 83px;
}
.content-1.extended .group {
  padding-bottom: 10px;
}
.content-1.extended h2 {
  margin-top: -36px;
}
.content-1.extended h2 + h2 {
  margin-top: -31px;
}
@media (min-width: 768px) {
  .content-1.extended .container {
    padding-bottom: 82px;
  }
  .content-1.extended .row {
    display: table;
    margin: 0;
    table-layout: fixed;
    width: 100%;
  }
  .content-1.extended .row > div {
    display: table-cell;
    float: none;
    padding-left: 0;
    padding-right: 41px;
    text-align: center;
    vertical-align: middle;
  }
  .content-1.extended .row > div.img {
    vertical-align: top;
  }
  .content-1.extended .group {
    padding-bottom: 11px;
    position: relative;
    right: -5px;
  }
  .content-1.extended h2 {
    left: 6px;
    margin-top: -35px !important;
    padding-bottom: 26px;
    position: relative;
    text-align: center;
  }
  .content-1.extended h2 + h2 {
    margin-top: -51px !important;
  }
  .content-1.extended p + .group,
  .content-1.extended h2 + .group,
  .content-1.extended div + .group {
    margin-top: -6px;
    padding-top: 0;
  }
  .content-1.extended .img + div h2 {
    margin-top: -36px !important;
  }
  .content-1.extended p {
    margin: 0;
    padding-bottom: 35px;
    padding-top: 0;
    text-align: left;
  }
  .content-1.extended p + p {
    margin-top: -35px;
  }
  .content-1.extended h2 + p {
    margin-top: -6px;
  }
  .content-1.extended iframe,
  .content-1.extended img {
    margin-bottom: 11px;
  }
}
@media (min-width: 768px) and (min-width: 768px) and (max-width: 990px) {
  .content-1.extended p + .group,
  .content-1.extended h2 + .group,
  .content-1.extended div + .group {
    margin-top: 2px;
  }
}
@media (min-width: 768px) and (max-width: 990px) {
  .content-1.extended .group .btn {
    display: block;
    margin-right: 0;
  }
  .content-1.extended .group .btn + .btn {
    margin: 10px 0 0;
  }
}
.content-1.extended .img {
  padding-bottom: 16px;
}
.content-1.extended .img iframe {
  width: 100% !important;
}
.content-1.extended .img img {
  max-width: 100%;
}
.content-1.extended .img + div h2 {
  margin-top: 0;
}
.content-1.extended .img + div h2 + h2 {
  margin-top: -31px;
}
.content-1.extended .img + div p {
  text-align: left;
}
@media (min-width: 768px) {
  .content-1.extended .img {
    padding-bottom: 0;
    padding-left: 0;
    padding-right: 41px !important;
  }
  .content-1.extended .img img,
  .content-1.extended .img iframe {
    float: right;
  }
  .content-1.extended .img + div {
    padding: 0 0 0 15px;
    text-align: left;
  }
  .content-1.extended .img + div h2 {
    left: -1px;
    text-align: left;
  }
  .content-1.extended .img + div h2 + h2 {
    margin-top: -53px !important;
  }
  .content-1.extended .img + div .group {
    left: -5px;
    right: auto;
  }
}
.content-1.extended div + .img {
  padding: 42px 15px 10px 15px;
}
@media (min-width: 768px) {
  .content-1.extended div + .img {
    padding: 0 0 0 15px !important;
  }
  .content-1.extended div + .img img,
  .content-1.extended div + .img iframe {
    float: left;
  }
}
@media (min-width: 768px) {
  .content-1.extended.left .row > div {
    text-align: left;
  }
  .content-1.extended.left .row > div h2 {
    left: -1px;
    text-align: left;
  }
  .content-1.extended.left .row > div p {
    text-align: left;
  }
  .content-1.extended.center .row > div {
    text-align: center;
  }
  .content-1.extended.center .row > div h2 {
    left: 0;
    text-align: center;
  }
  .content-1.extended.center .row > div p {
    text-align: left;
  }
  .content-1.extended.right .row > div {
    text-align: right;
  }
  .content-1.extended.right .row > div h2 {
    left: 6px;
    text-align: right;
  }
  .content-1.extended.right .row > div p {
    text-align: right;
  }
}
.msgbox-1 {
  overflow: hidden;
  padding: 0 20px;
  position: relative;
}
.msgbox-1 .container {
  padding: 41px 0 29px;
  position: relative;
  z-index: 3;
}
@media (max-width: 767px) {
  .msgbox-1 .container {
    padding: 67px 0 78px;
    text-align: center;
  }
}
.msgbox-1 .row > div + div {
  line-height: 67px;
}
@media (max-width: 767px) {
  .msgbox-1 .row > div + div {
    padding-bottom: 3px;
    padding-top: 23px;
  }
}
@media (max-width: 480px) {
  .msgbox-1 .row > div + div {
    padding-bottom: 15px;
    padding-top: 37px;
  }
}
.msgbox-1 h1,
.msgbox-1 h2 {
  letter-spacing: 4px;
  line-height: 33px;
  margin-bottom: 11px;
  margin-top: 10px;
}
.msgbox-1 h1 + h1,
.msgbox-1 h2 + h1,
.msgbox-1 h1 + h2,
.msgbox-1 h2 + h2 {
  margin-top: -11px;
}
@media (max-width: 767px) {
  .msgbox-1 h1,
  .msgbox-1 h2 {
    line-height: 1.5em;
    margin-bottom: 0;
  }
  .msgbox-1 h1 + h1,
  .msgbox-1 h2 + h1,
  .msgbox-1 h1 + h2,
  .msgbox-1 h2 + h2 {
    margin-top: -1px;
  }
}
.msgbox-1 p {
  color: #777;
  font-size: 17px;
  line-height: 27px;
  margin-bottom: 0;
  padding-bottom: 13px;
  padding-top: 16px;
  text-align: left;
}
.msgbox-1 p + p {
  margin-top: -13px;
  padding-top: 0;
}
@media (max-width: 767px) {
  .msgbox-1 p {
    padding-top: 20px;
  }
}
.msgbox-1 .btn {
  margin-top: -14px;
  margin-right: 10px;
}
@media (max-width: 480px) {
  .msgbox-1 .btn {
    display: block;
  }
  .msgbox-1 .btn + .btn {
    margin-top: 12px;
  }
}
.msgbox-1.dark {
  background: #3c3c3c;
  color: #fff;
}
.msgbox-1.dark p {
  color: #fff;
}
.msgbox-1.dark .btn-default {
  border-color: #fff;
  color: #fff;
}
.msgbox-1.dark .btn-default:hover,
.msgbox-1.dark .btn-default:focus,
.msgbox-1.dark .btn-default.focus,
.msgbox-1.dark .btn-default:active,
.msgbox-1.dark .btn-default.active,
.open > .dropdown-toggle.msgbox-1.dark .btn-default {
  background-color: #fff;
  border-color: #fff;
  color: #252525;
}
.content-2 {
  overflow: hidden;
  padding: 71px 20px 70px;
  position: relative;
}
.content-2.col-5 .row > div {
  position: relative;
  min-height: 1px;
  padding-left: 15px;
  padding-right: 15px;
}
@media (min-width: 768px) {
  .content-2.col-5 .row > div {
    display: inline-block;
    float: none;
    vertical-align: top;
    width: 33%;
  }
}
@media (min-width: 992px) {
  .content-2.col-5 .row > div {
    float: left;
    width: 20%;
  }
}
@media (min-width: 992px) {
  .content-2.col-5 {
    padding-top: 75px;
  }
  .content-2.col-5 .thumbnail h3 {
    margin-top: 15px;
  }
  .content-2.col-5 .thumbnail h3 + h3 {
    margin-top: -33px;
  }
}
.content-2.col-4 .row > div {
  position: relative;
  min-height: 1px;
  padding-left: 15px;
  padding-right: 15px;
}
@media (min-width: 768px) {
  .content-2.col-4 .row > div {
    float: left;
    width: 50%;
  }
}
@media (min-width: 992px) {
  .content-2.col-4 .row > div {
    float: left;
    width: 25%;
  }
}
.content-2.col-3 .row > div {
  position: relative;
  min-height: 1px;
  padding-left: 15px;
  padding-right: 15px;
}
@media (min-width: 768px) {
  .content-2.col-3 .row > div {
    float: left;
    width: 33.33333333%;
  }
}
@media (min-width: 992px) {
  .content-2.col-3 {
    padding-top: 64px;
  }
  .content-2.col-3 .thumbnail h3 {
    margin-top: 4px;
  }
  .content-2.col-3 .thumbnail h3 + h3 {
    margin-top: -33px;
  }
  .content-2.col-3 .thumbnail .group {
    margin-top: 37px;
  }
}
.content-2.col-2 .row > div {
  position: relative;
  min-height: 1px;
  padding-left: 15px;
  padding-right: 15px;
}
@media (min-width: 768px) {
  .content-2.col-2 .row > div {
    float: left;
    width: 50%;
  }
}
@media (min-width: 992px) {
  .content-2.col-2 {
    padding-top: 48px;
  }
  .content-2.col-2 .thumbnail > img {
    width: 100%;
    max-width: 300px;
  }
  .content-2.col-2 .thumbnail h3 {
    margin-top: -14px;
    margin-bottom: 20px;
    font-size: 25px;
    letter-spacing: 6px;
    line-height: 1.5em;
  }
  .content-2.col-2 .thumbnail h3 + h3 {
    margin-top: -19px;
  }
  .content-2.col-2 .thumbnail p {
    font-size: 17px;
    line-height: 27px;
  }
  .content-2.col-2 .thumbnail .btn {
    padding: 16px 27px;
    font-size: 18px;
    line-height: 1.3333333;
    border-radius: 0px;
    font-size: 14px;
    letter-spacing: 2px;
  }
}
@media (max-width: 767px) {
  .content-2 {
    padding: 0 20px;
  }
  .content-2 .row > div {
    -webkit-box-shadow: inset 0 1px 1px rgba(10, 10, 10, 0.06);
    box-shadow: inset 0 1px 1px rgba(10, 10, 10, 0.06);
  }
  .content-2.dark .row > div {
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.2);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.2);
  }
}
@media (min-width: 768px) and (max-width: 991px) {
  .content-2.col-5 {
    padding-top: 70px;
  }
  .content-2.col-5 .row > div + div + div + div {
    margin-top: 50px;
  }
  .content-2.col-5 .thumbnail h3 {
    margin-top: 10px;
  }
  .content-2.col-5 .thumbnail h3 + h3 {
    margin-top: -33px;
  }
  .content-2.col-4 {
    padding: 64px 20px 70px;
  }
  .content-2.col-4 .row > div + div + div {
    margin-top: 39px;
  }
  .content-2.col-4 .thumbnail h3 {
    margin-top: 4px;
    margin-bottom: 32px;
  }
  .content-2.col-4 .thumbnail h3 + h3 {
    margin-top: -33px;
  }
  .content-2.col-4 .thumbnail .group {
    margin-top: 37px;
  }
  .content-2.col-3 {
    padding-top: 73px;
  }
  .content-2.col-3 .thumbnail h3 {
    margin-top: 12px;
    margin-bottom: 33px;
  }
  .content-2.col-3 .thumbnail h3 + h3 {
    margin-top: -33px;
  }
  .content-2.col-3 .thumbnail .group {
    margin-top: 36px;
  }
  .content-2.col-2 {
    padding-top: 64px;
  }
  .content-2.col-2 .thumbnail h3 {
    margin-top: 4px;
    margin-bottom: 33px;
  }
  .content-2.col-2 .thumbnail h3 + h3 {
    margin-top: -34px;
  }
  .content-2.col-2 .thumbnail .group {
    margin-top: 36px;
  }
}
.content-2 .container {
  padding: 0;
  position: relative;
  z-index: 3;
}
.content-2 .row {
  margin-left: -24px;
  margin-right: -24px;
}
.content-2 .thumbnail {
  background: none;
  border: 0;
  margin-bottom: 0;
  padding-bottom: 0;
  padding-left: 0;
  padding-right: 0;
  text-align: center;
}
@media (max-width: 767px) {
  .content-2 .thumbnail {
    padding-top: 52px;
    padding-bottom: 65px;
    margin-bottom: 0;
  }
}
@media (max-width: 480px) {
  .content-2 .thumbnail {
    padding-bottom: 70px;
  }
}
.content-2 .thumbnail > img {
  max-width: 50%;
}
@media (max-width: 767px) {
  .content-2 .thumbnail > img {
    width: 100%;
    max-width: 300px;
  }
}
.content-2 .thumbnail h3 {
  font-size: 16px;
  letter-spacing: 1px;
  margin-bottom: 32px;
  margin-top: 11px;
}
.content-2 .thumbnail h3 + h3 {
  margin-top: -32px;
}
@media (max-width: 767px) {
  .content-2 .thumbnail h3 {
    font-size: 25px;
    letter-spacing: 6px;
    line-height: 1.5em;
    margin-bottom: 20px;
    margin-top: -14px;
  }
  .content-2 .thumbnail h3 + h3 {
    margin-top: -21px;
  }
}
.content-2 .thumbnail p {
  color: #999;
  font-size: 16px;
  line-height: 26px;
  text-align: left;
}
.content-2 .thumbnail p + p {
  margin-top: -10px;
}
@media (max-width: 767px) {
  .content-2 .thumbnail p {
    font-size: 17px;
    line-height: 27px;
  }
}
.content-2 .thumbnail .group {
  line-height: 43px;
  margin-bottom: 14px;
  margin-top: 33px;
  text-align: center;
}
@media (max-width: 767px) {
  .content-2 .thumbnail .group {
    margin-top: 29px;
    line-height: 67px;
  }
}
@media (max-width: 480px) {
  .content-2 .thumbnail .group {
    margin-top: 37px;
  }
}
@media (max-width: 767px) {
  .content-2 .thumbnail .btn {
    padding: 16px 27px;
    font-size: 18px;
    line-height: 1.3333333;
    border-radius: 0px;
    font-size: 14px;
    letter-spacing: 2px;
    margin-right: 9px;
  }
}
@media (max-width: 480px) {
  .content-2 .thumbnail .btn {
    display: block;
    margin-right: 0;
  }
  .content-2 .thumbnail .btn + .btn {
    margin-top: 12px;
  }
}
.content-2.simple h3 {
  margin-top: 0 !important;
  margin-bottom: 31px !important;
}
.content-2.simple h3 + h3 {
  margin-top: -30px !important;
}
.content-2.simple.col-5 {
  padding-top: 77px;
}
.content-2.simple.col-4,
.content-2.simple.col-3 {
  padding-top: 76px;
}
.content-2.simple.col-2 {
  padding-top: 64px;
}
@media (min-width: 768px) and (max-width: 991px) {
  .content-2.simple h3 {
    margin-bottom: 32px !important;
  }
  .content-2.simple.col-5 {
    padding-top: 76px;
  }
  .content-2.simple.col-5 .row > div + div + div + div {
    margin-top: 53px;
  }
  .content-2.simple.col-4 {
    padding-top: 77px;
  }
  .content-2.simple.col-4 .row > div + div + div {
    margin-top: 53px;
  }
  .content-2.simple.col-2 {
    padding-top: 76px;
  }
}
@media (max-width: 767px) {
  .content-2.simple {
    padding-top: 0 !important;
  }
  .content-2.simple .thumbnail {
    padding-top: 68px;
  }
  .content-2.simple h3 {
    margin-bottom: 20px !important;
  }
  .content-2.simple h3 + h3 {
    margin-top: -21px !important;
  }
}
.content-2.dark {
  background: #3c3c3c;
}
.content-2.dark h1,
.content-2.dark h2,
.content-2.dark h3,
.content-2.dark h4 {
  color: #fff;
}
.content-2.dark p {
  color: #fff;
}
.content-2.dark .btn-default {
  border-color: #fff;
  color: #fff;
}
.content-2.dark .btn-default:hover,
.content-2.dark .btn-default:focus,
.content-2.dark .btn-default.focus,
.content-2.dark .btn-default:active,
.content-2.dark .btn-default.active,
.open > .dropdown-toggle.content-2.dark .btn-default {
  background-color: #fff;
  border-color: #fff;
  color: #252525;
}
.pricing-table-1 {
  -webkit-box-shadow: inset 0 1px 0 rgba(10, 10, 10, 0.06);
  box-shadow: inset 0 1px 0 rgba(10, 10, 10, 0.06);
  background: #f0f0f0;
  overflow: hidden;
  padding: 100px 0 67px;
  position: relative;
}
.pricing-table-1 .container {
  display: block;
  float: none;
  margin-left: auto;
  margin-right: auto;
  max-width: 1000px;
  position: relative;
  z-index: 3;
}
.pricing-table-1.col-4 .row > div {
  position: relative;
  min-height: 1px;
  padding-left: 15px;
  padding-right: 15px;
  padding: 0;
}
@media (min-width: 768px) {
  .pricing-table-1.col-4 .row > div {
    float: left;
    width: 25%;
  }
}
.pricing-table-1.col-3 .container {
  max-width: 750px;
}
.pricing-table-1.col-3 .row > div {
  position: relative;
  min-height: 1px;
  padding-left: 15px;
  padding-right: 15px;
  padding: 0;
}
@media (min-width: 768px) {
  .pricing-table-1.col-3 .row > div {
    float: left;
    width: 33.33333333%;
  }
}
.pricing-table-1.col-2 .container {
  max-width: 600px;
}
.pricing-table-1.col-2 .row > div {
  position: relative;
  min-height: 1px;
  padding-left: 15px;
  padding-right: 15px;
  padding: 0;
}
@media (min-width: 768px) {
  .pricing-table-1.col-2 .row > div {
    float: left;
    width: 50%;
  }
}
.pricing-table-1 .plan {
  -webkit-box-shadow: 0 2px 2px rgba(10, 10, 10, 0.06);
  box-shadow: 0 2px 2px rgba(10, 10, 10, 0.06);
  background: #fff;
  color: #484f5a;
  margin-right: 1px;
  padding-bottom: 39px;
  text-align: center;
}
.pricing-table-1 .plan h3 {
  background: #323b44;
  border-radius: 7px 7px 0 0;
  color: #fff;
  font-size: 16px;
  letter-spacing: 1px;
  margin: 0;
  padding: 18px 0 19px;
  position: relative;
  top: -7px;
}
.pricing-table-1 .plan p {
  margin-bottom: 0;
}
.pricing-table-1 .plan .price {
  font-size: 80px;
  letter-spacing: 1px;
  padding: 7px 0 0;
}
.pricing-table-1 .plan .price small {
  color: #aaa;
  display: block;
  font-size: 13px;
  margin-top: -11px;
  padding-bottom: 19px;
}
.pricing-table-1 .plan .price strong {
  font-weight: normal;
  left: -10px;
  position: relative;
}
.pricing-table-1 .plan .price sup {
  display: inline-block;
  font-size: 32px;
  margin: 58px 0 0 -4px;
  position: relative;
  vertical-align: top;
  width: 25px;
}
.pricing-table-1 .plan .price:after {
  background: #eee;
  content: "";
  display: block;
  height: 1px;
  margin: 20px auto 0;
  width: 80%;
}
.pricing-table-1 .plan ul {
  font-size: 14px;
  list-style: none;
  margin: 35px 0 35px;
  padding-left: 0;
}
.pricing-table-1 .plan ul li {
  margin-bottom: 12px;
}
.pricing-table-1 .plan .btn {
  margin-bottom: 2px;
  margin-top: 1px;
}
.pricing-table-1 .favorite {
  -webkit-box-shadow: 0 0 10px rgba(10, 10, 10, 0.35);
  box-shadow: 0 0 10px rgba(10, 10, 10, 0.35);
  margin-left: -5px;
  margin-right: -5px;
  padding-bottom: 52px;
  position: relative;
  top: -13px;
  z-index: 2;
}
.pricing-table-1 .favorite h3 {
  background: #f97352;
}
.pricing-table-1 .favorite .price {
  padding-top: 20px;
}
.pricing-table-1 .favorite .price strong {
  left: -8px;
}
.pricing-table-1 .green h3 {
  background: #7ac673;
}
.pricing-table-1 .blue h3 {
  background: #27aae0;
}
.pricing-table-1 .orange h3 {
  background: #faaf40;
}
@media (max-width: 767px) {
  .pricing-table-1 {
    padding: 30px 20px 10px 20px;
  }
  .pricing-table-1 .plan {
    margin-bottom: 20px;
  }
  .pricing-table-1 .plan ul {
    margin: 36px 0 34px;
  }
  .pricing-table-1 .plan .btn {
    margin-top: 2px;
  }
  .pricing-table-1 .favorite {
    margin-left: 0;
    margin-right: 0;
    top: 0;
  }
}
@media (min-width: 480px) and (max-width: 767px) {
  .pricing-table-1 .plan {
    padding-bottom: 64px;
  }
  .pricing-table-1 .plan .price {
    font-size: 120px;
    line-height: 142px;
  }
  .pricing-table-1 .plan .price small {
    font-size: 16px;
    margin-top: -1px;
    padding-bottom: 18px;
    line-height: 23px;
  }
  .pricing-table-1 .plan .price sup {
    font-size: 36px;
    margin: 77px 0 0 -4px;
  }
  .pricing-table-1 .plan ul {
    font-size: 16px;
    margin: 35px 0 22px;
  }
  .pricing-table-1 .plan .btn {
    padding: 16px 27px;
    font-size: 18px;
    line-height: 1.3333333;
    border-radius: 0px;
    font-size: 14px;
    letter-spacing: 2px;
    margin-bottom: 3px;
    margin-top: -13px;
    position: relative;
    top: 26px;
  }
}
.mbr-section {
  overflow: hidden;
  padding: 0 20px;
  position: relative;
}
.mbr-section--full-height {
  height: 100vh;
}
.mbr-section--bg-adapted {
  background-attachment: scroll;
  background-position: 50% 0;
  background-repeat: no-repeat;
  background-size: cover;
}
.mbr-section--gray {
  background-color: #444444;
}
.mbr-section--light-gray {
  background-color: #f0f0f0;
}
.mbr-section--dark-gray {
  background-color: #3c3c3c;
}
.mbr-section__container {
  padding: 0;
  position: relative;
  z-index: 3;
}
.mbr-section__container--std-padding {
  padding: 93px 0;
}
.mbr-section__container--sm-padding {
  padding: 41px 0;
}
.mbr-section__container--isolated {
  padding-bottom: 93px;
  padding-top: 93px;
}
.mbr-section__container--first {
  padding-top: 93px;
  padding-bottom: 41px;
}
.mbr-section__container--middle {
  padding-bottom: 41px;
}
.mbr-section__container--last {
  padding-bottom: 93px;
}
.mbr-section__header {
  line-height: 1.5em;
  margin: -10px 0 0;
  text-align: center;
}
.mbr-arrow {
  bottom: 71px;
  left: 0;
  line-height: 1px;
  padding: 0 20px;
  position: absolute;
  width: 100%;
  z-index: 3;
}
.mbr-arrow__link {
  display: inline-block;
  font-size: 26px;
}
.mbr-arrow__link,
.mbr-arrow__link:hover,
.mbr-arrow__link:focus {
  color: #fff;
}
.mbr-arrow--floating .mbr-arrow__link {
  -webkit-animation: floating-arrow 1.6s infinite ease-in-out 0s;
  -o-animation: floating-arrow 1.6s infinite ease-in-out 0s;
  animation: floating-arrow 1.6s infinite ease-in-out 0s;
}
@-webkit-keyframes floating-arrow {
  from {
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
  65% {
    -webkit-transform: translateY(11px);
    transform: translateY(11px);
  }
  to {
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
}
@-o-keyframes floating-arrow {
  from {
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
  65% {
    -webkit-transform: translateY(11px);
    transform: translateY(11px);
  }
  to {
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
}
@keyframes floating-arrow {
  from {
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
  65% {
    -webkit-transform: translateY(11px);
    transform: translateY(11px);
  }
  to {
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
}
.mbr-arrow--dark .mbr-arrow__link,
.mbr-arrow--dark .mbr-arrow__link:hover,
.mbr-arrow--dark .mbr-arrow__link:focus {
  color: #252525;
}
@media (max-width: 767px) {
  .mbr-arrow {
    bottom: 41px;
  }
}
@media (max-width: 320px) {
  .mbr-arrow {
    bottom: 21px;
    text-align: center;
  }
}
@media all and (device-width: 320px) and (device-height: 568px) and (orientation: portrait) {
  .mbr-arrow {
    bottom: 31px;
  }
}
.mbr-box {
  display: table;
  width: 100%;
}
.mbr-box--stretched {
  height: 100%;
}
.mbr-box__magnet {
  display: table-cell;
  float: none;
  height: 100%;
  margin-bottom: 0;
  margin-top: 0;
  text-align: center;
  vertical-align: middle;
}
.mbr-box__magnet--sm-padding {
  padding: 41px 0;
}
.mbr-box__magnet--top-left,
.mbr-box__magnet--top-center,
.mbr-box__magnet--top-right {
  vertical-align: top;
}
.mbr-box__magnet--bottom-left,
.mbr-box__magnet--bottom-center,
.mbr-box__magnet--bottom-right {
  vertical-align: bottom;
}
.mbr-box__magnet--top-left,
.mbr-box__magnet--center-left,
.mbr-box__magnet--bottom-left {
  text-align: left;
}
.mbr-box__magnet--top-right,
.mbr-box__magnet--center-right,
.mbr-box__magnet--bottom-right {
  text-align: right;
}
.mbr-box__container {
  height: 50%;
}
@media (max-width: 767px) {
  .mbr-box__container {
    height: 100%;
  }
}
.mbr-overlay {
  background: #222;
  bottom: 0;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  z-index: 2;
}
.mbr-google-map__marker {
  color: #252525;
  display: none;
  margin: 0;
}
.mbr-google-map--loaded .mbr-google-map__marker {
  display: block;
}
.mbr-hero {
  color: #fff;
  position: relative;
}
.mbr-hero__text {
  font-size: 46px;
  font-weight: bold;
  left: -2px;
  letter-spacing: 2px;
  line-height: 50px;
  margin: -18px 0 1px 0;
  padding-bottom: 41px;
  position: relative;
  top: 8px;
}
.mbr-hero__subtext {
  font-size: 21px;
  line-height: 29px;
  margin: -32px 0 3px 0;
  padding: 0 0 41px 0;
  position: relative;
  top: 6px;
}
.mbr-figure {
  background: #252525;
  display: block;
  line-height: 1px;
  margin: 0;
  overflow: hidden;
  position: relative;
}
.mbr-figure--no-bg {
  background: none;
}
.mbr-figure--full-width {
  width: 100%;
}
.mbr-figure--full-width iframe,
.mbr-figure--full-width .mbr-figure__img,
.mbr-figure--full-width .mbr-figure__map {
  width: 100%;
}
.mbr-figure iframe,
.mbr-figure__img,
.mbr-figure__map {
  max-width: 100%;
}
.mbr-figure__map {
  height: 400px;
  line-height: 1.3em;
}
.mbr-figure__map--short {
  height: 300px;
}
.mbr-figure__caption {
  background: rgba(0, 0, 0, 0.5);
  bottom: 0;
  color: #fff;
  display: block;
  font-size: 17px;
  left: 0;
  line-height: 1.3em;
  min-height: 53px;
  padding: 17px 20px;
  position: absolute;
  text-align: left;
  width: 100%;
}
.mbr-figure__caption--no-padding {
  padding: 17px 0;
}
.mbr-figure--wysiwyg .mbr-figure__caption a,
.mbr-figure--wysiwyg .mbr-figure__caption a:hover {
  color: inherit;
  text-decoration: underline;
}
.mbr-figure--caption-inside-top .mbr-figure__caption {
  bottom: auto;
  top: 0;
}
.mbr-figure--caption-outside-top .mbr-figure__caption,
.mbr-figure--caption-outside-bottom .mbr-figure__caption {
  background: none;
  position: relative;
}
.mbr-figure--no-bg.mbr-figure--caption-outside-top .mbr-figure__caption,
.mbr-figure--no-bg.mbr-figure--caption-outside-bottom .mbr-figure__caption {
  color: #252525;
}
.mbr-figure--no-bg.mbr-figure--caption-outside-top .mbr-figure__caption {
  margin-top: -3px;
  padding-top: 0;
}
.mbr-figure--no-bg.mbr-figure--caption-outside-bottom .mbr-figure__caption {
  margin-top: -2px;
  padding-bottom: 0;
  top: 2px;
}
.mbr-figure__caption--std-grid {
  background: none;
  z-index: 2;
}
@media (min-width: 768px) {
  .mbr-figure__caption--std-grid {
    width: 715px;
    left: 50%;
    margin-left: -357.5px;
    padding: 17px 0;
  }
}
@media (min-width: 992px) {
  .mbr-figure__caption--std-grid {
    width: 935px;
    margin-left: -467.5px;
  }
}
@media (min-width: 1200px) {
  .mbr-figure__caption--std-grid {
    width: 1150px;
    margin-left: -575px;
  }
}
.mbr-figure__caption--std-grid:before {
  bottom: 0;
  content: "";
  position: absolute;
  top: 0;
  width: 200%;
  z-index: -1;
  margin-left: -50%;
}
.mbr-figure--caption-inside-top .mbr-figure__caption--std-grid:before,
.mbr-figure--caption-inside-bottom .mbr-figure__caption--std-grid:before {
  background: rgba(0, 0, 0, 0.6);
}
.mbr-figure__caption-small {
  color: #ccc;
  display: block;
  font-size: 14px;
  line-height: 1.3em;
}
.mbr-figure--no-bg.mbr-figure--caption-outside-top .mbr-figure__caption-small,
.mbr-figure--no-bg.mbr-figure--caption-outside-bottom .mbr-figure__caption-small {
  color: #777;
}
@media (max-width: 767px) {
  .mbr-figure--caption-inside-top .mbr-figure__caption,
  .mbr-figure--caption-inside-bottom .mbr-figure__caption {
    background: none;
    position: relative;
  }
  .mbr-figure--caption-inside-top .mbr-figure__caption--std-grid:before,
  .mbr-figure--caption-inside-bottom .mbr-figure__caption--std-grid:before {
    display: none;
  }
}
.mbr-reviews {
  list-style: none;
  margin: 0 -15px;
  padding: 3px 0 0 0;
}
.mbr-reviews__item {
  position: relative;
  margin-top: 39px;
}
.mbr-reviews__text {
  background: #fafafa;
  border-radius: 3px;
  border: 1px solid #ededed;
  color: #777;
  font-size: 16px;
  line-height: 26px;
  padding: 20px;
  position: relative;
}
.mbr-reviews__text:before {
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  transform: rotate(45deg);
  width: 14px;
  height: 14px;
  background-color: #fafafa;
  border-color: #ededed;
  border-style: none solid solid none;
  border-width: 0 1px 1px 0;
  bottom: -8px;
  content: "";
  display: block;
  left: 50px;
  position: absolute;
}
.mbr-reviews__p {
  margin: 0;
}
.mbr-reviews--wysiwyg a,
.mbr-reviews__link {
  color: #2e2e2e;
}
.mbr-reviews--wysiwyg a:hover,
.mbr-reviews__link:hover {
  color: #f97352;
  text-decoration: none;
}
.mbr-reviews--wysiwyg .mbr-reviews__author-bio a,
.mbr-reviews__link--hidden {
  color: inherit;
}
.mbr-reviews--wysiwyg .mbr-reviews__author-bio a:hover,
.mbr-reviews__link--hidden:hover {
  color: #f97352;
}
.mbr-reviews__author {
  margin-top: 30px;
  padding-left: 102px;
  position: relative;
}
.mbr-reviews__author--short {
  margin-top: 27px;
  padding-left: 32px;
}
.mbr-reviews__author-img {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  left: 33px;
  position: absolute;
  top: 0;
}
.mbr-reviews__author-name {
  color: #777;
  font-size: 14px;
  font-weight: bold;
  position: relative;
  top: -3px;
}
.mbr-reviews__author-bio {
  color: #999;
  font-size: 12px;
}
@media (max-width: 767px) {
  .mbr-reviews__author {
    padding-bottom: 32px;
  }
  .mbr-reviews__author--short {
    padding-bottom: 1px;
  }
}
@media (min-width: 768px) and (max-width: 991px) {
  .mbr-reviews__item:nth-of-type(2n+1) {
    clear: left;
  }
}
@media (min-width: 992px) {
  .mbr-reviews__item:nth-of-type(3n+1) {
    clear: left;
  }
}
.mbr-header {
  margin-top: -19px;
  padding: 0;
  position: relative;
  top: 9px;
}
.mbr-header__text {
  display: block;
  font-size: 25px;
  font-weight: bold;
  letter-spacing: 6px;
  line-height: 1.5em;
  margin: 0;
  text-align: left;
}
.mbr-header__subtext {
  color: #777;
  font-size: 14px;
  font-style: italic;
  letter-spacing: 1px;
  margin: 8px 0 7px 0;
}
.mbr-header--wysiwyg .mbr-header__subtext a,
.mbr-header--wysiwyg .mbr-header__subtext a:hover {
  color: #2e2e2e;
  text-decoration: none;
}
.mbr-header--inline {
  margin-top: 0;
  padding: 41px 0 28px 0;
  top: 0;
}
.mbr-header--inline .mbr-header__text {
  letter-spacing: 4px;
  line-height: 1em;
  margin: 15px 0 0 0;
  text-align: left;
}
@media (max-width: 767px) {
  .mbr-header--inline {
    padding: 47px 0 38px 0;
  }
  .mbr-header--inline .mbr-header__text {
    display: block;
    margin: 0 0 38px 0;
  }
}
.mbr-social-icons__icon {
  -webkit-transition: all 0.2s ease-in-out 0s;
  -o-transition: all 0.2s ease-in-out 0s;
  transition: all 0.2s ease-in-out 0s;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  font-size: 29px;
  height: 56px;
  line-height: 61px;
  margin: 0 10px 13px 0;
  position: relative;
  text-align: center;
  width: 56px;
}
.mbr-social-icons__icon:hover {
  color: #fff;
}
.mbr-social-icons--style-1 .mbr-social-icons__icon:hover {
  background: #252525 !important;
}
.mbr-contacts {
  color: #9c9c9c;
  font-size: 14px;
  line-height: 1.7em;
  padding: 45px 0 46px;
}
.mbr-contacts__img {
  max-width: 100%;
  margin: 6px 0 5px 40px;
}
.mbr-contacts__img--left {
  margin-left: 0;
}
.mbr-contacts__text {
  margin: 0;
}
.mbr-contacts__header {
  color: #fff;
  font-size: 14px;
  letter-spacing: 1px;
  margin-bottom: 20px;
  margin-top: 3px;
}
.mbr-contacts__list {
  list-style: none;
  margin: 0;
  padding: 0;
}
.mbr-contacts--wysiwyg a,
.mbr-contacts__link {
  color: #aeaeae;
}
.mbr-contacts--wysiwyg a:hover,
.mbr-contacts__link:hover {
  color: #f97352;
  text-decoration: none;
}
@media (max-width: 767px) {
  .mbr-contacts__img {
    margin-bottom: 10px;
  }
  .mbr-contacts__header {
    margin-top: 20px;
    margin-bottom: 10px;
  }
}
.mbr-footer {
  color: #9c9c9c;
  font-size: 13px;
  letter-spacing: 1px;
  line-height: 1.5em;
  padding: 37px 0 39px;
  word-spacing: 1px;
}
.mbr-footer__copyright {
  margin: 0;
}
.mbr-footer--wysiwyg .mbr-footer__copyright a,
.mbr-footer__link {
  color: #aeaeae;
}
.mbr-footer--wysiwyg .mbr-footer__copyright a:hover,
.mbr-footer__link:hover {
  color: #f97352;
  text-decoration: none;
}
.mbr-buttons {
  margin: -26px 0 13px 0;
  position: relative;
  text-align: left;
  top: 26px;
}
.mbr-buttons__btn {
  margin: 0 10px 13px 0;
}
.mbr-buttons--center {
  left: 5px;
  text-align: center;
}
.mbr-buttons--right {
  text-align: right;
}
.mbr-buttons--right .mbr-buttons__btn {
  margin: 0 0 13px 10px;
}
@media (max-width: 530px) {
  .mbr-buttons {
    left: 0;
  }
  .mbr-buttons__btn,
  .mbr-buttons--right .mbr-buttons__btn {
    display: inline-block;
    margin: 0 0 13px 0;
    text-align: center;
    width: 100%;
  }
}
.mbr-article {
  color: #777;
  font-size: 17px;
  line-height: 27px;
  text-align: left;
  position: relative;
  margin-top: -21px;
  top: 14px;
}
.mbr-article--wysiwyg h1,
.mbr-article--wysiwyg h2,
.mbr-article--wysiwyg h3,
.mbr-article--wysiwyg h4,
.mbr-article--wysiwyg h5,
.mbr-article--wysiwyg h6 {
  color: #252525;
  display: block;
  font-weight: bold;
  line-height: 1.3em;
  text-align: left;
}
.mbr-article--wysiwyg h1 {
  font-size: 27px;
  letter-spacing: 3px;
}
.mbr-article--wysiwyg h2 {
  font-size: 23px;
  letter-spacing: 2px;
}
.mbr-article--wysiwyg h3 {
  font-size: 19px;
  letter-spacing: 1px;
}
.mbr-article--wysiwyg h4 {
  font-size: 14px;
}
.mbr-article--wysiwyg h5 {
  font-size: 11px;
}
.mbr-article--wysiwyg h6 {
  font-size: 10px;
}
.mbr-article--wysiwyg p,
.mbr-article--wysiwyg ul,
.mbr-article--wysiwyg ol,
.mbr-article--wysiwyg blockquote {
  margin: 0 0 10px 0;
}
.mbr-article--wysiwyg blockquote {
  font-size: 17px;
  border-color: #f97352;
}
.mbr-article--wysiwyg a {
  color: #2e2e2e;
}
.mbr-article--wysiwyg a:hover {
  color: #f97352;
  text-decoration: none;
}
.social-likes__counter {
  -webkit-transition: all 0.2s ease-in-out 0s;
  -o-transition: all 0.2s ease-in-out 0s;
  transition: all 0.2s ease-in-out 0s;
  background: #3c3c3c;
  border-radius: 23px;
  font-size: 12px;
  height: 23px;
  line-height: 24px;
  min-width: 23px;
  padding: 0 5px;
  position: absolute;
  right: -7px;
  text-align: center;
  top: -7px;
}
.social-likes__counter_empty {
  display: none;
}
.social-likes_style-1 .social-likes__icon:hover {
  background: #252525 !important;
}
.social-likes_style-1 .social-likes__icon:hover .social-likes__counter {
  background: #f97352;
}
.social-likes_style-2 .social-likes__icon {
  background: #252525;
}
.social-likes_style-2 .social-likes__counter {
  background: #f97352;
}
.social-likes_style-2 .social-likes__icon:hover .social-likes__counter {
  background: #3c3c3c;
}
#top-1 {
	position: absolute;
	left: -1000px;
	top: -1000px;
	opacity: 0.1;
}
/*!
 * Clean Blog v1.0.0 (http://startbootstrap.com)
 * Copyright 2014 Start Bootstrap
 * Licensed under Apache 2.0 (https://github.com/IronSummitMedia/startbootstrap/blob/gh-pages/LICENSE)
 */

body{font-family:Lora,'Times New Roman',serif;font-size:20px;color:#404040}p{line-height:1.5;margin:30px 0}p a{text-decoration:underline}h1,h2,h3,h4,h5,h6{font-family:'Open Sans','Helvetica Neue',Helvetica,Arial,sans-serif;font-weight:800}a{color:#404040}a:hover,a:focus{color:#0085a1}a img:hover,a img:focus{cursor:zoom-in}blockquote{color:gray;font-style:italic}hr.small{max-width:100px;margin:15px auto;border-width:4px;border-color:#fff}.navbar-custom{position:absolute;top:0;left:0;width:100%;z-index:3;font-family:'Open Sans','Helvetica Neue',Helvetica,Arial,sans-serif}.navbar-custom .navbar-brand{font-weight:800}.navbar-custom .nav li a{text-transform:uppercase;font-size:12px;font-weight:800;letter-spacing:1px}@media only screen and (min-width:768px){.navbar-custom{background:0 0;border-bottom:1px solid transparent}.navbar-custom .navbar-brand{color:#fff;padding:20px}.navbar-custom .navbar-brand:hover,.navbar-custom .navbar-brand:focus{color:rgba(255,255,255,.8)}.navbar-custom .nav li a{color:#fff;padding:20px}.navbar-custom .nav li a:hover,.navbar-custom .nav li a:focus{color:rgba(255,255,255,.8)}}@media only screen and (min-width:1170px){.navbar-custom{-webkit-transition:background-color .3s;-moz-transition:background-color .3s;transition:background-color .3s;-webkit-transform:translate3d(0,0,0);-moz-transform:translate3d(0,0,0);-ms-transform:translate3d(0,0,0);-o-transform:translate3d(0,0,0);transform:translate3d(0,0,0);-webkit-backface-visibility:hidden;backface-visibility:hidden}.navbar-custom.is-fixed{position:fixed;top:-61px;background-color:rgba(255,255,255,.9);border-bottom:1px solid #f2f2f2;-webkit-transition:-webkit-transform .3s;-moz-transition:-moz-transform .3s;transition:transform .3s}.navbar-custom.is-fixed .navbar-brand{color:#404040}.navbar-custom.is-fixed .navbar-brand:hover,.navbar-custom.is-fixed .navbar-brand:focus{color:#0085a1}.navbar-custom.is-fixed .nav li a{color:#404040}.navbar-custom.is-fixed .nav li a:hover,.navbar-custom.is-fixed .nav li a:focus{color:#0085a1}.navbar-custom.is-visible{-webkit-transform:translate3d(0,100%,0);-moz-transform:translate3d(0,100%,0);-ms-transform:translate3d(0,100%,0);-o-transform:translate3d(0,100%,0);transform:translate3d(0,100%,0)}}.intro-header{background-color:gray;background:no-repeat center center;background-attachment:scroll;-webkit-background-size:cover;-moz-background-size:cover;background-size:cover;-o-background-size:cover;margin-bottom:50px}.intro-header .site-heading,.intro-header .post-heading,.intro-header .page-heading{padding:100px 0 50px;color:#fff}@media only screen and (min-width:768px){.intro-header .site-heading,.intro-header .post-heading,.intro-header .page-heading{padding:150px 0}}.intro-header .site-heading,.intro-header .page-heading{text-align:center}.intro-header .site-heading h1,.intro-header .page-heading h1{margin-top:0;font-size:50px}.intro-header .site-heading .subheading,.intro-header .page-heading .subheading{font-size:24px;line-height:1.1;display:block;font-family:'Open Sans','Helvetica Neue',Helvetica,Arial,sans-serif;font-weight:300;margin:10px 0 0}@media only screen and (min-width:768px){.intro-header .site-heading h1,.intro-header .page-heading h1{font-size:80px}}.intro-header .post-heading h1{font-size:35px}.intro-header .post-heading .subheading,.intro-header .post-heading .meta{line-height:1.1;display:block}.intro-header .post-heading .subheading{font-family:'Open Sans','Helvetica Neue',Helvetica,Arial,sans-serif;font-size:24px;margin:10px 0 30px;font-weight:600}.intro-header .post-heading .meta{font-family:Lora,'Times New Roman',serif;font-style:italic;font-weight:300;font-size:20px}.intro-header .post-heading .meta a{color:#fff}@media only screen and (min-width:768px){.intro-header .post-heading h1{font-size:55px}.intro-header .post-heading .subheading{font-size:30px}}.post-preview>a{color:#404040}.post-preview>a:hover,.post-preview>a:focus{text-decoration:none;color:#0085a1}.post-preview>a>.post-title{font-size:30px;margin-top:30px;margin-bottom:10px}.post-preview>a>.post-subtitle{margin:0;font-weight:300;margin-bottom:10px}.post-preview>.post-meta{color:gray;font-size:18px;font-style:italic;margin-top:0}.post-preview>.post-meta>a{text-decoration:none;color:#404040}.post-preview>.post-meta>a:hover,.post-preview>.post-meta>a:focus{color:#0085a1;text-decoration:underline}@media only screen and (min-width:768px){.post-preview>a>.post-title{font-size:36px}}.section-heading{font-size:36px;margin-top:60px;font-weight:700}.caption{text-align:center;font-size:14px;padding:10px;font-style:italic;margin:0;display:block;border-bottom-right-radius:5px;border-bottom-left-radius:5px}footer{padding:50px 0 65px}footer .list-inline{margin:0;padding:0}footer .copyright{font-size:14px;text-align:center;margin-bottom:0}.floating-label-form-group{font-size:14px;position:relative;margin-bottom:0;padding-bottom:.5em;border-bottom:1px solid #eee}.floating-label-form-group input,.floating-label-form-group textarea{z-index:1;position:relative;padding-right:0;padding-left:0;border:none;border-radius:0;font-size:1.5em;background:0 0;box-shadow:none!important;resize:none}.floating-label-form-group label{display:block;z-index:0;position:relative;top:2em;margin:0;font-size:.85em;line-height:1.764705882em;vertical-align:middle;vertical-align:baseline;opacity:0;-webkit-transition:top .3s ease,opacity .3s ease;-moz-transition:top .3s ease,opacity .3s ease;-ms-transition:top .3s ease,opacity .3s ease;transition:top .3s ease,opacity .3s ease}.floating-label-form-group::not(:first-child){padding-left:14px;border-left:1px solid #eee}.floating-label-form-group-with-value label{top:0;opacity:1}.floating-label-form-group-with-focus label{color:#0085a1}form .row:first-child .floating-label-form-group{border-top:1px solid #eee}.btn{font-family:'Open Sans','Helvetica Neue',Helvetica,Arial,sans-serif;text-transform:uppercase;font-size:14px;font-weight:800;letter-spacing:1px;border-radius:0;padding:15px 25px}.btn-lg{font-size:16px;padding:25px 35px}.btn-default:hover,.btn-default:focus{background-color:#0085a1;border:1px solid #0085a1;color:#fff}.pager{margin:20px 0 0}.pager li>a,.pager li>span{font-family:'Open Sans','Helvetica Neue',Helvetica,Arial,sans-serif;text-transform:uppercase;font-size:14px;font-weight:800;letter-spacing:1px;padding:15px 25px;background-color:#fff;border-radius:0}.pager li>a:hover,.pager li>a:focus{color:#fff;background-color:#0085a1;border:1px solid #0085a1}.pager .disabled>a,.pager .disabled>a:hover,.pager .disabled>a:focus,.pager .disabled>span{color:gray;background-color:#404040;cursor:not-allowed}::-moz-selection{color:#fff;text-shadow:none;background:#0085a1}::selection{color:#fff;text-shadow:none;background:#0085a1}img::selection{color:#fff;background:0 0}img::-moz-selection{color:#fff;background:0 0}body{webkit-tap-highlight-color:#0085a1}

        </style>
  </head>
</body>