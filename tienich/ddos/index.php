<!--
  ui.html
   
	Script to perform a DDoS UDP Flood by PHP
 
	This tool is written on educational purpose, please use it on your own good faith.
  
  GNU General Public License version 2.0 (GPLv2)
	@version	0.1
-->
<!DOCTYPE html>
<html>
<head>
	<title>DDoS UDP Flood</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.23.1" />
	<script>
		// microAjax - https://github.com/TheZ3ro/microajax/
		function microAjax(B,A){this.bindFunction=function(E,D){return function(){return E.apply(D,[D])}};this.stateChange=function(D){if(this.request.readyState==4){this.callbackFunction(this.request.responseText)}};this.getRequest=function(){if(window.ActiveXObject){return new ActiveXObject("Microsoft.XMLHTTP")}else{if(window.XMLHttpRequest){return new XMLHttpRequest()}}return false};this.postBody=(arguments[2]||"");this.callbackFunction=A;this.url=B;this.request=this.getRequest();if(this.request){var C=this.request;C.onreadystatechange=this.bindFunction(this.stateChange,this);if(this.postBody!==""){C.open("POST",B,true);C.setRequestHeader("X-Requested-With","XMLHttpRequest");C.setRequestHeader("Content-type","application/x-www-form-urlencoded");C.setRequestHeader("Connection","close")}else{C.open("GET",B,true)}C.send(this.postBody)}};
	</script>
</head>
<body>
	<div id="ddos">
		<label>Host:</label><input type="text" id="host"><br/>
		<label>Port:</label><input type="number" id="port" max=65535 min=1 step=1><br/>
		<label>Packet:</label><input type="number" id="packet" min=1 step=1><br/>
		<label>Time:</label><input type="number" id="time" min=1 step=1><br/>
		<label>Bytes:</label><input type="number" id="bytes" max=65000 min=1 step=1><br/>
		<label>Pass:</label><input type="text" id="pass" value="apple"><br/>
		<button id="send" onClick="javascript:fire();">Fire!</button>
		<br/><br/>
		<textarea id="log" rows="10" cols="50"></textarea>
	</div>
	<script>
		function fire(){
			var host=document.getElementById("host").value;
			var port=document.getElementById("port").value;
			var packet=document.getElementById("packet").value;
			var time=document.getElementById("time").value;
			var pass=document.getElementById("pass").value;
			var bytes=document.getElementById("bytes").value;
			var _log=document.getElementById("log");
			
			if(host!="" && pass!=""){
				var url='./ddos.php?pass='+pass+'&host='+host+(port!=""? '&port='+port:'')+(time!=""? '&time='+time:'')+(packet!=""? '&packet='+packet:'')+(bytes!=""? '&bytes='+bytes:'');
				console.log(url);
				microAjax(url, function(result) { _log.value=result; });
			}
		}
	</script>
</body>
</html>