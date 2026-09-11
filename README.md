🩺 MedLink

MedLink est une application web Laravel qui met en relation les hôpitaux et les médecins pour la publication, la recherche et la gestion de missions médicales.

🎯 Objectif

Les hôpitaux publient des missions médicales.

Les médecins recherchent les missions disponibles.

Les médecins peuvent déposer des candidatures.

Les hôpitaux consultent, acceptent ou refusent les candidatures.

Les utilisateurs reçoivent des notifications liées aux candidatures.

👥 Rôles

👑 Administrateur

Dashboard

Gestion des utilisateurs

Modification des rôles

Suppression des utilisateurs

CRUD des spécialités

🏥 Hôpital

Dashboard

Gestion du profil

CRUD des missions

Consultation des candidatures reçues

Consultation du profil du médecin candidat

Acceptation / refus des candidatures

👨‍⚕️ Médecin

Dashboard

Gestion du profil professionnel

Gestion de la spécialité

CV au format PDF

Consultation des missions ouvertes

Recherche et filtres

Candidature à une mission

Gestion de ses candidatures

📋 Mission

Une mission contient :

titre

description

spécialité recherchée

budget

ville

date de début

date de fin

nombre de postes

niveau d'expérience

statut

Statuts :

ouverte
fermee
annulee

Fermeture automatique

Une mission peut recevoir plusieurs candidatures.

Elle passe automatiquement à fermee lorsque le nombre de candidatures acceptées atteint le nombre de postes.

Exemple :

3 postes
→ 1 acceptée : ouverte
→ 2 acceptées : ouverte
→ 3 acceptées : fermée

📝 Candidature

Une candidature contient :

nom
CV
message
date_candidature
statut
id_medecin
id_mission

Statuts :

en_attente
acceptee
refusee
annulee

Un médecin ne peut pas postuler deux fois à la même mission.

🔔 Notifications

Le système utilise :

Events

Listeners

Notifications Laravel

Queue

Événements :

NouvelleCandidature
CandidatureAcceptee
CandidatureRefusee

Ils permettent notamment de notifier l'hôpital lors d'une nouvelle candidature et le médecin lorsqu'une candidature est acceptée ou refusée.

📄 CV

Le médecin peut sélectionner un fichier PDF depuis son ordinateur.

Les CV sont stockés dans :

storage/app/public/cv/

Le chemin du fichier est enregistré en base de données.

Pour créer le lien public :

php artisan storage:link

🗄️ Base de données

Tables principales :

users
specialites
hopitals
medecins
missions
candidatures
notifications
sessions

Relations principales :

User      → Hopital
User      → Medecin
Hopital   → Missions
Medecin   → Specialite
Medecin   → Candidatures
Mission   → Candidatures

🛡️ Sécurité

Le projet utilise :

Middleware de rôle

Policies Laravel

Validation des formulaires

Protection CSRF

Authentification Laravel Breeze

Policies :

MissionPolicy
CandidaturePolicy
SpecialitePolicy

🏗️ Structure

app/
├── Events/
├── Http/
│   ├── Controllers/
│   └── Middleware/
├── Listeners/
├── Models/
├── Notifications/
└── Policies/

database/
├── factories/
├── migrations/
└── seeders/

resources/
├── css/
├── js/
└── views/

routes/
├── web.php
└── auth.php

storage/
└── app/public/cv/

tests/
├── Feature/
└── Unit/

🛠️ Technologies

Laravel 13.29.0

PHP 8.3.32

MySQL

Blade

Tailwind CSS

Vite

Laravel Breeze

Eloquent ORM

PHPUnit

Git / GitHub

Docker / Docker Compose

🚀 Installation

git clone <URL_DU_REPOSITORY>
cd MedLink
composer install
npm install
copy .env.example .env
php artisan key:generate

Configurer MySQL dans .env, puis :

php artisan migrate
php artisan storage:link
npm run dev
php artisan serve --port=8001

Application :

http://127.0.0.1:8001

Pour les notifications en queue :

php artisan queue:work

🧪 Tests

Les tests couvrent notamment :

authentification

profils

missions

candidatures

spécialités

notifications

dashboards

Dernier résultat :

47 passed
91 assertions

Lancer les tests :

php artisan test

🐳 Docker

Une configuration Docker est présente avec :

Laravel / PHP 8.3

MySQL 8.0

Docker Compose

Configuration du port MySQL Docker :

3308 → 3306

📌 Commandes utiles

php artisan --version
php -v
php artisan route:list
php artisan migrate:status
php artisan optimize:clear
php artisan storage:link
php artisan queue:work
php artisan test
php artisan serve --port=8001

🚫 Fonctionnalités non implémentées

Cette version ne contient pas :

Messaging

Reviews / Évaluations

📍 État du projet

MedLink dispose actuellement de l'authentification, des rôles, des dashboards, des profils Hôpital/Médecin, du CRUD des missions, du CRUD des candidatures, de la recherche et des filtres, des spécialités, des notifications avec Events/Listeners/Queue, du stockage des CV PDF, des Policies et des tests PHPUnit.