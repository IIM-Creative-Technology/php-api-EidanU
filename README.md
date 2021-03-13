# DOCUMENTATION

## Généralité
L'api est composé de 4 classes, 4 matieres, 4 intervenants, 40 notes et 10 etudiants. On utilise ici API platform pour manipuler les entitées.

## Fonctionnement
Pour utilise l'API il faut creer un token à partir de la methode POST sur l'url http://127.0.0.1:8000/api/login sur Postman
Par la suite, il faut se connecter en rentrant ce token sur la page http://127.0.0.1:8000/api dans la section "authorize" en ecrivant "Bearer" espacé et suivi de votre token.
Il est maintenant possible de manipuler les entitées (les methodes delete sont sujettes à des erreurs dues aux clefs etrangeres)
