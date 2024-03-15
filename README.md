# Guide d'installation et d'utilisation de Laravel Movie

## Prérequis
- Docker Desktop : [Télécharger Docker Desktop](https://www.docker.com/products/docker-desktop)
- Composer : [Télécharger Composer](https://getcomposer.org/download/)

## Installation du projet

1. Clonez le projet depuis le référentiel GitHub :
    ```bash
    git clone https://github.com/Elgrim69/movie.git
    cd movie
    ```

2. Installez les dépendances PHP et JavaScript :
    ```bash
    composer install
    npm install
    ```

## Création du fichier env et de la clef App
1. Executer la commande suivante pour créer votre fichier env
 ```bash
   cp .env.example .env
 ```

2. Exectuer la commande suivante pour créer votre clef App
```bash
   php artisan key:generate
```

## Installation de Sail
1. Exécutez la commande suivante pour installer Laravel Sail :
    ```bash
    php artisan sail:install
    ```

2. Pour faciliter l'utilisation de Sail, vous pouvez définir un alias en exécutant :
    ```bash
    alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'
    ```

## Mise en route des serveurs

1. Démarrez les conteneurs Docker :
    ```bash
    sail up -d
    ```

2. Compilez les ressources JavaScript et CSS :
    ```bash
    npm run dev
    ```

## Migration

1. Pour exécuter les migrations de base de données, utilisez la commande suivante :
    ```bash
    sail artisan migrate
    ```

2. Pour exécuter les scripts de seeding de base de données, vous pouvez utiliser la commande :
    ```bash
    sail artisan db:seed --class 'Database\Seeders\PeopleSeeder'
    ```

## Personnalisation

- **Configuration de l'environnement :** Vous pouvez personnaliser les variables d'environnement dans le fichier `.env` de votre projet Laravel.
- **Personnalisation de Sail :** Consultez la documentation de [Laravel Sail](https://laravel.com/docs/sail) pour en savoir plus sur la configuration et la personnalisation de votre environnement de développement.
