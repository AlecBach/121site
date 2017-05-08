<html>
<head></head>
<body style="background: rgb(252,255,242); color: black; border-radius: 3px; border: 1px solid rgb(200,200,200); padding: 0px 30px 5px;">
<h1 style="text-align: center;">A new message has been sent through your website.</h1>
<h2>Content:</h2>
<ul style="font-size: 1.2em">
	<li>Name: {{$name}}</li>
	<li>Email: {{$email}}</li>
	<li>Phone number: {{$number}}</li>
	<li>Message: {{$content}}</li>
</ul>
<p>The reply button on this email will send to {{$name}}.</p>
<p>If you think there is a problem with this email, message <a href="mailto:alec.bach97@gmail.com">Alec Bach</a> for a fix.</p>
</body>
</html>