<?php

function elegantwhite_check_ie()
{
    if (isset($_SERVER['HTTP_USER_AGENT']) && 
    (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
        return true;
    else
        return false;
}

function elegantwhite_ie_options() {
	
	
	
	 echo '
    
    
    <style type="text/css" media="screen">
    
 

/* ---------------------------------- Start ---------------------------------- */


/* --------- Alignment --------- */

.alignleft {
	display: inline;
	float: left;
	margin-right: 1.625em;
}

img.alignleft {
	display: inline;
	float: left;
	margin-right: 1.625em;
	margin-top: 1.625em;
	margin-bottom: 1.625em;
}

.alignright {
	display: inline;
	float: right;
	margin-left: 1.625em;
}

img.alignright {
	display: inline;
	float: right;
	margin-left: 1.625em;
	margin-top: 1.625em;
	margin-bottom: 1.625em;
}

.sticky {
	
}

img {
border:0;
}

.aligncenter {
	clear: both;
	display: block;
	margin-left: auto;
	margin-right: auto;
}

img.aligncenter {
	clear: both;
	display: block;
	margin-left: auto;
	margin-right: auto;
margin-top: 1.625em;
	margin-bottom: 1.625em;
}

img.alignnone {
	display: block;
	clear: both;
	margin-top: 1.625em;
	margin-bottom: 1.625em;
}

/* Text elements */

p {
	margin-bottom: 1.625em;
}

#post ul, #post ol, #sidebar ul, #sidebar ol {
	margin: 0 0 1.625em 1.5em;
}

ul {
	list-style: square;
}

ol {
	list-style-type: decimal;
}

ol ol {
	list-style: upper-alpha;
}

ol ol ol {
	list-style: upper-roman;
}

ol ol ol ol {
	list-style: lower-alpha;
}

ul ul, ol ol, ul ol, ol ul {
	margin-bottom: 0;
}

dl {
	margin: 0 1.625em;
}

dt {
	font-weight: bold;
}

dd {
	margin-bottom: 1.625em;
}

strong {
	font-weight: bold;
}

cite, em, i {
	font-style: italic;
}

blockquote {
	font-family: Helvetica, Arial, sans-serif;
	font-style: italic !important;
	font-weight: 100;
	background-color: #f3f3f3;
	padding:25px 25px 5px 25px;
	margin: 2em 2em;
	border-left:3px solid #6e6e6e;
}

blockquote em, blockquote i, blockquote cite {
	font-style: normal;
}

blockquote cite {
	color: #666;
	font: 12px "Helvetica Neue", Helvetica, Arial, sans-serif;
	font-weight: 300;
	letter-spacing: 0.05em;
	text-transform: uppercase;
}

pre {
	background-color:#ededed;
	margin:0 0 30px 0;
	padding:30px 30px 30px 40px;
	font: 13px "Courier 10 Pitch", Courier, monospace;
	font-size:15px;
	line-height:20px;
}

code, kbd, samp, var {
	font: 13px Monaco, Consolas, "Andale Mono", "DejaVu Sans Mono", monospace;
}

.wp-caption-text {
	text-align: center;
}

abbr, acronym, dfn {
	border-bottom: 1px dotted #666;
	cursor: help;
}

address {
	display: block;
	margin: 0 0 1.625em;
}

ins {
	background: #ffccaa;
	text-decoration: none;
}

sup, sub {
	font-size: 10px;
	height: 0;
	line-height: 1;
	position: relative;
	vertical-align: baseline;
}

sup {
	bottom: 1ex;
}

sub {
	top: .5ex;
}

em {
	font-style: italic;
}

strike, del, s {
	text-decoration: line-through;
}


/* --------- Forms --------- */

input[type=text] {
    border:1px solid #dcdcdc;
	background-color: #f6f6f6;
	outline: none;
	width:60%;
	font-size:18px;
	font-family: Helvetica;
	font-weight: 100;
	padding:13px 15px 13px 15px;
	border-radius:5px;
	-moz-border-radius:5px;
	-khtml-border-radius:5px;

 }
 
input[type=password] {
border:1px solid #dcdcdc;
	background-color: #f6f6f6;
	outline: none;
	letter-spacing: .3em;
	font-size:18px;
	font-family: Helvetica;
	font-weight: 100;
	padding:13px 15px 13px 15px;
	border-radius:5px;
	-moz-border-radius:5px;
	-khtml-border-radius:5px;

 }

 
input[type=text]:focus, input[type=password]:focus {
border:1px solid #b9b9b9;
-webkit-transition: 0.5s;
   -moz-transition: 0.5s;
   -o-transition: 0.5s;
 }

textarea {
	border:1px solid #dcdcdc;
	background-color: #f6f6f6;
	outline: none;
	width:75%;
	font-size:18px;
	font-family: Helvetica;
	font-weight: 100;
	padding:15px 15px 15px 15px;
	border-radius:5px;
	-moz-border-radius:5px;
	-khtml-border-radius:5px;
}

textarea:focus {
	border:1px solid #b9b9b9;
	-webkit-transition: 0.5s;
   -moz-transition: 0.5s;
   -o-transition: 0.5s;
}

input[type=submit] {
	background-color: #0092e0;
	padding:16px 50px;
	cursor: pointer;
	color:#fff;
	font-size:16px;
	font-weight: bold;
	border-radius:5px;
	-moz-border-radius:5px;
	-khtml-border-radius:5px;
	border:0;
	-webkit-transition: 0.3s;
   -moz-transition: 0.3s;
   -o-transition: 0.3s;
}

input.search-sidebar {
	width:175px;
	margin:-1px 0 0 0px;
	border:0;
	background-color: #f6f6f6;
	border:1px solid #dadada;
	outline: none;
	font-size:16px;
	color:#acacac;
	font-family: Helvetica;
	font-weight: 100;
	padding:12px 15px 11px 15px;
	border-radius: 30px;
	-moz-border-radius:30px;
	-khtml-border-radius:30px;
	-webkit-transition: 0.6s;
   -moz-transition: 0.6s;
   -o-transition: 0.6s;
}

input.search-sidebar:focus {
    outline: none;
	border:1px solid #dadada;
	color:#676767;
}

/* --------- Links --------- */

a {
	color:#0092e0;
	text-decoration: none;
}

a.more-link {
	text-decoration: underline;
}



/* --------- Author Box --------- */

div.author {
	background-color: #f8f8f8;
	margin:50px 0 0 0;
	padding:40px;
}

.author-name {
	padding:0 0 0 15px;
}

#author-avatar {
	position:absolute;
	margin:-20px auto 0 auto;
}

#author-description {
	margin:0 0 0 100px;
}


/* --------- Other Options --------- */

div.page-links a {
	background-color: #efefef;
	padding:5px 10px;
	border-radius: 5px;
	color: #515151;
} 

div.category-links {
	width:700px;
	margin:30px 0 0 0;
}

ul.post-categories {
	list-style-type: none;
	margin:-5px 0 0 -40px;
}

div.category-links a {
	background-color: #efefef;
	padding:0px 10px;
	float:left;
	margin:10px 10px 0 0;
	font-size: 14px;
	border-radius: 5px;
	-moz-border-radius:5px;
	-khtml-border-radius:5px;
	color: #515151;
}

div.tag-links a {
	background-color: #efefef;
	padding:0px 10px;
	float:left;
	margin:10px 10px 0 0;
	font-size: 14px;
	border-radius: 5px;
	-moz-border-radius:5px;
	-khtml-border-radius:5px;
	color: #515151;
}


div.tag-links {
	width:700px;
	margin:30px 0 0 0;
}

div.page-links {
	font-size: 14px;
}

div.page-links a {
	background-color: #efefef;
	padding:10px 10px;
	margin:10px 4px 0 4px;
	font-size: 14px;
	border-radius: 5px;
	-moz-border-radius:5px;
	-khtml-border-radius:5px;
	color: #515151;
}

div.page-links a:first-child {
	background-color: #efefef;
	padding:5px 10px;
	margin:10px 10px 0 0;
	font-size: 14px;
	border-radius: 5px;
	-moz-border-radius:5px;
	-khtml-border-radius:5px;
	color: #515151;
}

div.tags-title {
		color: #666;
		margin:25px 0 -5px 0;
	font-size: 13px;
	text-align: left;
	font-weight: 500;
	letter-spacing: 0.1em;
	line-height: 2.6em;
	text-transform: uppercase;
}

div.page-title {
		color: #666;
		margin:25px 0 5px 0;
	font-size: 13px;
	text-align: left;
	font-weight: 500;
	letter-spacing: 0.1em;
	line-height: 2.6em;
	text-transform: uppercase;
}

div.page-links a:last-child {
   background-color: #efefef;
	padding:5px 10px;
	border-radius: 5px;
	-moz-border-radius:5px;
	-khtml-border-radius:5px;
	color: #515151;
	margin:0 5px 0 0;
}

li.recentcomments {
	padding:10px 5px 10px 0px;
	border-bottom: 1px dotted #dedede;
}

li.recentcomments:last-child {
	border:0;
}

#sidebar #sidebar-widget li, #sidebar ul.blogroll li {
	padding:12px 5px 12px 0px;
	border-bottom: 1px dotted #dedede;
}

#sidebar #sidebar-widget li:last-child, #sidebar ul.blogroll li:last-child {
	border:0;
}


/* --------- Tables --------- */

table {
	border-bottom: 1px solid #ddd;
	margin: 10px 0 25px 0;
	width: 100%;
}

th {
	color: #666;
	font-size: 14px;
	font-weight: 500;
	text-align: left;
	letter-spacing: 0.1em;
	line-height: 3.1em;
	text-transform: uppercase;
}

td {
	border-top: 1px solid #ddd;
	text-align: left;
	padding: 10px 10px 10px 0px;
}


/* --------- WP-Calendar Styling --------- */

table[id=wp-calendar] { 
	border-collapse: collapse;
	width:100%;
}

table[id=wp-calendar] caption {
	font-weight:bold;
	background-color: #3b3b3b;
	color:#fff;
	cursor: default;
	padding:8px 0;
}

table[id=wp-calendar] thead, table[id=wp-calendar] th {
	text-align:center;
	color:#fff;
	background-color: #0092e0;
}

table[id=wp-calendar] th {
   border-left: 1px solid #007fc9;
   border-right: 1px solid #007fc9;
   border-bottom: 1px solid #eee;
   padding: 5px 5px 5px 5px;
   cursor: default;
   text-align:center;

}

table[id=wp-calendar] tbody, table[id=wp-calendar] td {
	background-color: #f8f8f8;
}

table[id=wp-calendar] td { 
	padding: 5px;
	text-align: center;
	border: 1px #ddd solid;
}

#slogan {
    position: absolute;
    margin:-310px 0px 0 0px;
    float:left;
    max-width:900px;
    word-break: break-word;
    line-height: 30px;
    padding:10px 20px;
    background-color: rgba(28,28,28,0.40);
	color:#fff;
	font-family: Helvetica;
	font-weight: 100;
	font-size:20px;
}

.space {
	height:60px;
}

.space2 {
	height:60px;
}

#search {
    width:200px;
    margin:25px 0 0 795px;
	position: absolute;
}



body {
	margin: 0;
	padding: 0;
	background-color: #fff;
	font-family: Helvetica;
	font-weight: 100;
}

#search {
	display: none;
}

ul, ol {
	margin:0 0 0 0;
	padding: 0 0 0 0;
}

table[id=wp-calendar] { 
	border-collapse: collapse;
	width:90%;
}

#container {
    margin:0px 0px 20px 0px;
	background-color: #fff;
	padding:30px 25px 50px 25px;
	overflow: hidden;
}

#second-container {
  margin:-25px 0px 20px 0px;
	background-color: #fff;
	padding:30px 0px 50px 0px;
}

#slogan {
	display: none;
}

table[id=wp-calendar] { 
	border-collapse: collapse;
	margin:0px auto;
	width:100%;
}

#line {
	height:8px;
	width:100%;
	margin:0px 0 0px 0px;
	background-color: #0092e0;
}


/* --------- Headings --------- */

h1, h2, h3, h4, h5, h6 {
	font-weight: 500;
}

h2 {
	font-size: 1.8em;
	line-height: 1.4em;
}
h3 {
	font-size: 1.4em;
	line-height: 1.7em;
}
h4 {
	font-size: 1.2em;
	line-height: 2.0em;
}
h5 {
	font-size: 1em;
	line-height: 2.3em;
}
h6 {
	font-size: 0.9em;
	line-height: 2.6em;
}




/* ----------------- Images ----------------- */

img {
	max-width:100%;
	margin:0 25px 0 0;
	height: auto;
	width: auto;
}


.header {
	border-radius: 5px;
	-moz-border-radius:5px;
	-khtml-border-radius:5px;
	background-position: center center;
	box-shadow: 0 0 0 #fff;
	background-size: cover;
	margin:30px 0 -50px 0;
}

/* ----------------- Blogtitle ----------------- */

#blogtitle {
	font: 40px "Helvetica Neue", Helvetica, Arial, sans-serif;
	letter-spacing: 0.05em;
	text-align: center;
	word-break: break-word;
	font-weight: 100;
	color:#7e7e7e;
}

#blogdescription {
	font: 20px "Helvetica Neue", Helvetica, Arial, sans-serif;
	margin:5px 0 0 0;
	text-align: center;
	word-break: break-word;
	letter-spacing: .07em;
	font-weight: 100;
	color:#7e7e7e;
}


/* ----------------- Navigation ----------------- */

#nav {
	margin:30px 0px 0px 0px;
	display: none;
}

a {
	word-wrap: break-word;
}

ul.nav {
	margin:0 0 0 0px;
}

ul.nav li, ul.children li  {
	list-style-type: none;
	float: left;
}

ul.nav li a {
	list-style-type: none;
	margin:10px 10px 0 0;
	float: left;
	text-decoration: none;
	padding:10px 13px 10px 13px;
	font-family: Helvetica;
	font-size:15px;
	color:#4e4e4e;
	font-weight:600;
	border:0;
	border-radius:5px;
	-moz-border-radius:5px;
	-khtml-border-radius:5px;
	background-color: #f0f0f0;
	-webkit-transition: 0.2s;
	-moz-transition: 0.2s;
	-o-transition: 0.2s;
}

ul.nav li.current_page_item a , ul.nav li.current_page_item a:hover {
	background-color: #0092e0;
	color:#fff;
   -webkit-transition: 0.3s;
   -moz-transition: 0.3s;
   -o-transition: 0.3s;
   cursor:pointer;
}

ul.nav li a:hover {
	background-color: #0092e0;
	color:#fff;
   -webkit-transition: 0.2s;
   -moz-transition: 0.2s;
   -o-transition: 0.2s;
   cursor:pointer;
}



/* ----------------- Show menu button ----------------- */

#button {
	max-width:150px;
	cursor: pointer;
	color:#fff;
	padding: 10px 5px;
	font-family: Helvetica;
	border-radius:5px;
	-moz-border-radius:5px;
	text-transform: uppercase;
	font-weight: 100;
	font-size:14px;
	letter-spacing: .1em;
	-webkit-border-radius: 5px;
	background-color:#006eb2;
	text-align: center;
	margin:40px auto 30px auto;
}


/* ----------------- define site layout ----------------- */

#content {
	font-family: Helvetica;
	margin:60px 0 0 0;
	font-weight: 100;
	color:#515151;
	line-height: 27px;
}

table[id=wp-calendar] { 
	border-collapse: collapse;
	width:100%;
	margin:0 0 0 0px;
}

#sidebar {

	margin:0 -50px 0 -50px;
	padding: 50px 50px 50px 50px;
	background-color: #f7f7f7;

}

#sidebar div[id] {
	margin:30px 30px 0px 30px;
	text-align: center;
}

#sidebar-widget {
	font-family: Helvetica;
	margin:50px 30px 0px 30px;
	text-align: center;
	font-weight: 100;
	color:#515151;
	line-height: 27px;
}

#sidebar-widget li, ul.blogroll li {
	list-style-type: none;
	margin: 0 0 0 -20px;
	padding: 3px 0;
}

#sidebar-widget li.recentcomments {
	padding:10px 5px 10px 0px;
	border-bottom: 1px dotted #dedede;
}

#sidebar-widget li.recentcomments:last-child {
	border:0;
}

.sidebar-heading {
	font-family:Helvetica;
	font-weight:500;
	font-size:20px;
	margin:0px 0 0 0;
}

/* ----------------- clearing settings ----------------- */

#clear {
	clear: both;
}


/* ----------------- Article ----------------- */

#post {
	margin:130px 0 0 0;
	line-height: 27px;
	font-weight: 100;
}

#post:first-child {
	margin:0;
}

.post-title {
    color: #666;
	margin:15px 0 -20px 0;
	font-size: 13px;
	text-align: left;
	font-weight: 500;
	letter-spacing: 0.1em;
	line-height: 2.6em;
	text-transform: uppercase;
}

h1 {
	font-family: "Helvetica";
	font-size:32px;
	line-height: 39px;
	font-weight: 100;
	color:#515151;
}

a.h1 {
	color:#0092e0;
	text-decoration: none;
}

.articleline1 {
	height:1px;
	margin:-5px 0 3px 0;
	width:100%;
	background-color: #dddddd;
}

.articleline2 {
	height:1px;
	width:100%;
	margin:3px 0 25px 0;
	background-color: #dddddd;
}

.articledate {
	font-size: 11px;
}

span.date {
	font-size: 15px;
}


/* ----------------- Footer ----------------- */

#footer-text {
    font-family: Helvetica;
    text-align: center;
    margin:20px 30px 0px 30px;
	font-weight: 100;
	color:#515151;
	line-height: 27px;
}

#footer-credit {
    font-family: Helvetica;
    text-align: center;
    margin:20px 30px 20px 30px;
	font-weight: 100;
	color:#515151;
	font-size:11px;
	text-transform: uppercase;
	letter-spacing: .1em;
}

.line-footer {
	height:1px;
	margin:-5px 30px 0px 30px;
	background-color: #dddddd;
}

ul.footer-menu {
font-family: Helvetica;
font-weight: 100;
text-align:center;
font-size:14px;
}

#footer-nav {
	margin:20px 0 0 0;
}

ul.footer-menu li.menu-item {
	display:inline;
	line-height: 30px;
	margin:0 10px 0px 10px;
}


/* ----------------- Comments ----------------- */

.comment{
	margin:50px 0 0 0;
}

.comment:first-child {
	margin:0;
}

.show-comments {
	margin:150px 0 0 0;
}

.commentline {
	height:1px;
	margin:0px 0px 30px 0px;
	background-color: #dddddd;
}

.comment-name {
	font-size:16px;
	color: #0092e0;
}

.comment-date {
    font-size:14px;
	margin:-10px 0 0 0;
}

.comment-text {
    margin:10px 0 0 0;
    font-size: 16px;
    line-height: 25px;
}

.countcomments {
	font-size:30px;
	margin:0px 0 50px 0;
}

.comment-fields {
	margin:0;
}

.comment-box {
	margin:-60px 0 0px 70px;
}

.comment-line {
    background-color:#d2d2d2;
    height:1px;
	margin:5px 0 20px 0;
	width:100%;
}

.avatar {
	width:50px;
	box-shadow: 0 1px 3px #9e9e9e;
	height:50px;
}

.children .comment {
	margin:50px 0 0 0px;
}

.children .children .comment {
	margin:50px 0 0 0px;
}

.bypostauthor {
	background-color: #f7f7f7; 
	margin:30px 0px 0 0px;
	padding:20px 25px 40px 25px;
}



.alignleft {
	display: inline;
	float: left;
	margin-right: 1.625em;
}

img.alignleft {
	display: inline;
	float: left;
	margin-right: 1.625em;
	margin-top: 1.625em;
	margin-bottom: 1.625em;
}

.alignright {
	display: inline;
	float: right;
	margin-left: 1.625em;
}

img.alignright {
	display: inline;
	float: right;
	margin-left: 1.625em;
	margin-top: 1.625em;
	margin-bottom: 1.625em;
}

.sticky {
	
}

.aligncenter {
	clear: both;
	display: block;
	margin-left: auto;
	margin-right: auto;
}

img.aligncenter {
	clear: both;
	display: block;
	margin-left: auto;
	margin-right: auto;
margin-top: 1.625em;
	margin-bottom: 1.625em;
}

img.alignnone {
	display: block;
	clear: both;
	margin-top: 1.625em;
	margin-bottom: 1.625em;
}


#blogtitle {
	font: 45px "Helvetica Neue", Helvetica, Arial, sans-serif;
	letter-spacing: 0.05em;
	text-align: left;
	width:700px;
	word-break: break-word;
	font-weight: 100;
	color:#7e7e7e;
}

#blogdescription {
	font: 25px "Helvetica Neue", Helvetica, Arial, sans-serif;
	margin:5px 0 0 0;
	text-align: left;
	width:700px;
	word-break: break-word;
	letter-spacing: .07em;
	font-weight: 100;
	color:#7e7e7e;
}

img {
	max-width:100%;
}

#button {
	display: none;
}

#search {
	display: block;
}

h1 {
	font-family: "Helvetica";
	font-size:32px;
	word-break: normal;
	line-height: 39px;
	font-weight: 100;
	color:#515151;
}

ul, ol {
	margin: 0 0 0 0;
}


ul.nav {
	margin:0 0 0px 0px;
	padding: 0 0 0 0;
}


#nav {
	display: block;
	width:1050px;
	text-align: center;
	margin:30px 0px 30px 0px;
	padding: 0 0 0 0;
}

.naviline-one {
	height:1px;
	margin:30px 30px -15px 0px;
	width:1000px;
	background-color: #dddddd;
}

.naviline-two {
	height:1px;
	margin:25px 30px 5px 0px;
	width:1000px;
	background-color: #dddddd;
}

#container {
    margin:0px auto 0px auto;
	background-color: #fff;
	width:1000px;
	padding:30px 50px 50px 50px;
}

#second-container {
    margin:0px auto 0px auto;
	background-color: #fff;
	width:1000px;
	font-size:17px;
	padding:30px 0px 50px 0px;
}


#content {
	font-family: Helvetica;
	float:left;
	width:660px;
	margin:0px 0 0 0;
	font-weight: 100;
	color:#515151;
	line-height: 28px;
}

#content2 {
	font-family: Helvetica;
	float:left;
	width:100%;
	margin:20px 0 0 0;
	font-weight: 100;
	color:#515151;
	line-height: 27px;
}

/* ----------------- Sidebar ----------------- */

#sidebar {
	font-family: Helvetica;
	float:right;
	width:220px !important;
	max-width:250px;
	padding:0;
	text-align: left;
	margin:20px 0 0 0;
	background:none;
	font-weight: 100;
	color:#515151;
	line-height: 27px;
}

#sidebar-widget li, ul.blogroll li {
	list-style-type: none;
	margin: 0 0 0 -20px;
	padding: 3px 0;
}

#sidebar-widget li.recentcomments {
	padding:10px 5px 10px 0px;
	border-bottom: 1px dotted #dedede;
}

#sidebar-widget li.recentcomments:last-child {
	border:0;
}

table[id=wp-calendar] { 
	border-collapse: collapse;
	width:100%;
	margin:0 0 0 0px;
}

#sidebar div[id] {
	text-align: left;
	margin:0px 0px 50px 0px;
}

#sidebar-widget {
	font-family: Helvetica;
	display: block;
	text-align: left;
	width:220px !important;
	margin:0px 0 0px 0px;
	float: right;
	font-weight: 100;
	color:#515151;
	line-height: 27px;
}

.sidebar-heading {
	font-family:Helvetica;
	font-weight:500;
	font-size:20px;
	text-align: left;
	margin:0 0 0px 0;
}




#slogan {
    display: block;
    margin:-270px 0px 0px 0px;
    float:left;
    max-width:900px;
    word-break: break-word;
    line-height: 30px;
    padding:10px 20px;
    background-color: rgba(28,28,28,0.40);
	color:#fff;
	font-family: Helvetica;
	font-weight: 100;
	font-size:20px;
}


/* ----------------- Gallery ----------------- */

.wp-caption {
	text-align: center;
	font-size:13px;
	font-style: italic;
}

.gallery-caption {
	font-size: 13px;
	font-style: italic;
	line-height: 1.4;
	text-align: center;
	width:160px;
	color: #666;
}

.gallery-item {
   background-color:#fff;
}

.gallery-icon {
	
	margin:0 0 0 -55px;
}

.gallery-item img {
 
    border:0;
	-webkit-border-radius: 6px;
	   -moz-border-radius: 6px;
	        border-radius: 6px;
	        box-shadow:0 0 0 #000;
}

dl.gallery-item  {
	margin:0;
}
dl.gallery-icon img {
	border: 1px solid #ddd;
}
dl.gallery-item a {
	border: none;
}


/* ----------------- Footer ----------------- */


.line-footer {
	height:1px;
	margin:-5px auto 0px auto;
	width:1000px;
	background-color: #dddddd;
}

ul.footer-menu {
margin:0 0 0 0px;
text-align:center;
font-size:14px;
}

ul.footer-menu li.menu-item {
	display:inline;
	margin:0 10px 0px 10px;
	line-height: 30px;
}

 
    
    </style>
    
    
    
    
    
    ';
    

	
	
}

if ( elegantwhite_check_ie() ) { add_action( 'wp_head', 'elegantwhite_ie_options' ); }


?>