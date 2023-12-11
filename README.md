# démo - JSON Web Token (JWT) - RFC 7519

Une simple démo d'application web PHP sur l'utilisation des [JSON Web Token](https://www.rfc-editor.org/rfc/rfc7519) (JWT) délivré par le système pour autoriser un·e utilisateur·ice à accéder à une partie protégée d'un site web.

## Lancer le projet

Lancer le contenu du projet sur votre serveur local favori. Avec le serveur built-in de PHP

~~~
php -S localhost:5000
~~~

1. Essayer d'accéder à la page sous le lien `Edit content`. Se connecter avec l'utilisateur `foo` et le mot de passe `bar`. Ré-accéder à la page. 
2. Essayer de modifier le JWT enregistré dans les cookies pour tester l'application et la compréhension des JWT.

## Ressources

- [JSON Web Token (JWT)](https://www.rfc-editor.org/rfc/rfc7519)
- [RFC 9068: JWT Profile for OAuth 2.0 Access Tokens](https://oauth.net/2/jwt-access-tokens/)
- [Introduction to JSON Web Tokens](https://jwt.io/introduction)
- [Décoder le JWT](https://jwt.io/)