﻿

# Avocat Connect: Système de Réservation pour Cabinet d'Avocats

## Description du Projet

Ce projet est une application web dédiée à la gestion des réservations de consultations pour un cabinet d'avocats. Les clients peuvent consulter les profils des avocats, réserver des consultations et gérer leurs réservations. Les avocats, quant à eux, peuvent gérer leurs disponibilités, accepter ou refuser des demandes de consultations, et mettre à jour leur profil professionnel.

## Fonctionnalités Principales

### Pour les Clients:
- **Inscription & Connexion**: Créez un compte pour réserver une consultation.
- **Explorer les Avocats**: Consultez les profils des avocats, leurs spécialités et leurs années d'expérience.
- **Réserver une Consultation**: Choisissez un avocat et réservez un créneau horaire disponible.
- **Gérer les Réservations**: Consultez, modifiez ou annulez vos réservations à tout moment.
- **Mettre à Jour les Informations**: Gérez vos informations personnelles.

### Pour les Avocats:
- **Gestion des Réservations**: Acceptez ou refusez les demandes des clients en fonction de vos disponibilités.
- **Gestion du Profil**: Mettez à jour vos informations professionnelles, y compris votre photo et biographie.
- **Gestion des Disponibilités**: Définissez vos créneaux horaires pour les consultations.
- **Statistiques**: Suivez l'état des réservations (demandes en attente, approuvées, etc.).
![image](https://github.com/user-attachments/assets/6e37b0cc-a42f-412f-8daf-fb6d5faf0f0c)

### Design & UX/UI:
- **Design Responsive**: Optimisé pour tous les appareils (mobile, tablette, bureau).
- **Design Moderne**: Élégant, minimaliste et professionnel, avec une palette de couleurs raffinée.
- **Interface Intuitive**: Facilité de navigation pour une expérience utilisateur fluide et agréable.

## Technologies Utilisées
- **Frontend**: HTML, CSS, JavaScript, SweetAlert, Validation avec Regex, Modals Dynamiques.
- **Backend**: PHP avec PDO pour la gestion des bases de données.
- **Sécurité**: Hashage des mots de passe (bcrypt/Argon2), protection contre les injections SQL, protection XSS et CSRF (bonus).

## Mesures de Sécurité
- **Hashage des Mots de Passe**: Utilisation de techniques sécurisées comme bcrypt ou Argon2.
- **Protection XSS**: Validation et échappement des entrées utilisateurs pour empêcher les attaques XSS.
- **Prévention des Injections SQL**: Utilisation de requêtes préparées pour protéger contre les injections SQL.
- **Protection CSRF**: Ajout de tokens CSRF pour sécuriser les actions sensibles.

## Installation

1. **Cloner le Dépôt**:
    ```bash
    git clone https://github.com/ton-utilisateur/avocat-connect.git
    ```

2. **Accéder au Dossier du Projet**:
    ```bash
    cd avocat-connect
    ```

3. **Configurer la Base de Données**:
    - Importer le fichier SQL pour créer les tables nécessaires.

## Utilisation

- **Pour le Client**: Inscrivez-vous et explorez les avocats disponibles. Réservez, modifiez ou annulez vos consultations.
- **Pour l'Avocat**: Connectez-vous à votre tableau de bord, gérez vos réservations, et modifiez vos informations et disponibilités.

