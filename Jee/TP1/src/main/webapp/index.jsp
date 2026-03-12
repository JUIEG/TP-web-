<%@ page contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<!DOCTYPE html>
<html>
<head>
    <title>JSP - Hello World</title>
</head>
<body>
<%! public String enItalic (String message){
    return("<p syle = 'font-style : italic'> "+message+"</p>");
}   %>

<h1><%= "Hello World!" %>
</h1>
<br/>
<a href="hello-servlet">Hello Servlet</a>
<a href="essai.jsp">Aller à la page essai</a>
</body>
</html>