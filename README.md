# démo - JWT Token (RFC 7519)

Une simple démo d'application web en PHP sur l'utilisation des JWT (JSON Web Token) dans le but d'autoriser un·e utilisateur·ice à accéder à des parties protégées du site.

## Lancer le projet

Lancer le contenu du projet sur votre serveur local favori. Avec le serveur built-in de PHP

~~~
php -S localhost:5000
~~~

Essayer d'accéder à la page sous le lien `Éditer le contenu du site`. Se connecter avec l'utilisateur `foo` et le mot de passe `bar`. Réaccéder à la page. Modifier les autorisations, le token enregistré dans les cookies pour tester l'application et la compréhension des JWT.

## Ressources

- [JSON Web Token (JWT)](https://www.rfc-editor.org/rfc/rfc7519)
- [RFC 9068: JWT Profile for OAuth 2.0 Access Tokens](https://oauth.net/2/jwt-access-tokens/)
- [Introduction to JSON Web Tokens](https://jwt.io/introduction)
- [Décoder le JWT](https://jwt.io/)