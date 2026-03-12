<%--
  Created by IntelliJ IDEA.
  User: 22400647
  Date: 12/03/2026
  Time: 14:27
  To change this template use File | Settings | File Templates.
--%>

<%@ page contentType="text/html;charset=UTF-8" %>
<html>
<head>
    <title>Essai JSP</title>
</head>
<body>

<form action="" method="post">
    <input type="text" name="mot">
    <input type="submit" value="Envoyer">
</form>

<%!
    public String enVert(String texte){
        return "<p style='color:green'>" + texte + "</p>";
    }

    public String enRouge(String texte){
        return "<p style='color:red'>" + texte + "</p>";
    }
%>

<%
    String mot = request.getParameter("mot");
    String resultat = "";

    if(mot != null){
        if(mot.equals("servlet")){
            resultat = enVert(mot);
        }else{
            resultat = enRouge(mot);
        }
    }
%>

<p>Le contenu du champ input est : <%= resultat %></p>

</body>
</html>