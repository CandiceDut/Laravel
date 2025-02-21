# Transformation en API
### Ajout du controller nécessaire 
Pour pouvoir transformer le projet en API, il faut créer un nouveau __controller__ du __client__ dédié à l'API dans un dossier *__Api__* (pour bien différencier le controller du client de base et celui de l'API sans pour autant perdre le fichier de base) avec la commande :
```php artisan make:controller Api/ClientController```
Ensuite on reprends __chaque fonction__ du controller client original en faisant en sorte de retourner des *__fichiers Json__* contenant les informations demandées au lieu de retourner des __vues__.
Par exemple pour index(), la fonction de ClientController de base va retourner la __vue__ clients.index :
```php
public function index()
{ 
    $clients = Client::all(); // Récupérer tous les clients de la base de données
    return view('clients.index', compact('clients')); 
}
```
Alors que la fonction de ClientController du dossier Api va retourner un __Json__ avec les __données__ des clients :
```php
public function index()
{ 
    $clients = Client::all();
    return response()->json($clients);
}
```
### Ajout des routes nécessaires
Pour avoir ensuite accès aux différentes fonctionnalités concernant le client, on doit créer des __routes__ dans le fichier *__api.php__* du dossier *__routes__* déjà présent lors de la création du projet :
On met d'abord le __chemin__ pour accéder au __controller__ afin de pouvoir utiliser toutes ses fonctionnalités :
```use App\Http\Controllers\Api\ClientController;```
Puis on ajoute chaque route avec son __mode d'utilisation__ (put, get, post...), le __nom__ de la route (/clients, /clients/{id}...) et enfin la __fonction__ du controller utilisée (index, show...) :
```Route::get('/clients',[ClientController::class,'index']);```

### Test avec Postman
En allant sur Postman, il m'a été possible de tester si l'Api fonctionnait bien et renvoyait bien les bonnes données dans un fichier Json.
Par exemple en entrant l'URL : ```http://lakartxela.iutbayonne.univ-pau.fr/~cdutourni001/Laravel/TD1/public/api/clients/1``` et en choisissant la méthode __GET__, Postman renvoie les données du _client 1_ : 
```json
{
    "NumeroClient": 1,
    "nom": "Piper Bailey",
    "prenom": "Leonard",
    "age": 66,
    "adresse": "638 Libbie Skyway\nJakubowskimouth, WI 90542-3709",
    "email": "hills.alphonso@example.org",
    "carteBancaire": "4916237212694932",
    "created_at": "2025-02-13T09:13:07.000000Z",
    "updated_at": "2025-02-13T09:13:07.000000Z"
}
```
Si le client _n'existe pas_ comme le 15, Postman renvoie le message suivant :
```json
{
    "message": "Client non trouvé !"
}
```
Pour une méthode __POST__, on peut entrer l'URL ```http://lakartxela.iutbayonne.univ-pau.fr/~cdutourni001/Laravel/TD1/public/api/clients/store``` avec toutes les données dans les __Query params__ qui s'ajoutent à cette URL à la fin pour donner l'URL suivante : ```http://lakartxela.iutbayonne.univ-pau.fr/~cdutourni001/Laravel/TD1/public/api/clients/store?NumeroClient=12&nom=Dutournier&prenom=Candice&age=19&adresse=9 impasse armantiou, dax&email=moi@gmail.com&carteBancaire=1234567891234567```. Cette méthode va retourner le Json suivant :
```json
{
    "nom": "Dutournier",
    "prenom": "Candice",
    "age": 19,
    "adresse": "9 impasse armantiou, dax",
    "email": "moi@gmail.com",
    "carteBancaire": "1234567891234567",
    "updated_at": "2025-02-21T11:15:21.000000Z",
    "created_at": "2025-02-21T11:15:21.000000Z",
    "numeroClient": 12
}
```
Pour une méthode __PUT__, on entre l'URL ```http://lakartxela.iutbayonne.univ-pau.fr/~cdutourni001/Laravel/TD1/public/api/clients/1``` qui appelle la méthode permettant de __modifier__ un client (ici le _numéro 1_), on modifie les paramètres (__sauf__ le _numéro du client_) dans les __Query params__ ce qui donne l'URL suivante : ```http://lakartxela.iutbayonne.univ-pau.fr/~cdutourni001/Laravel/TD1/public/api/clients/1?nom=Bal&prenom=Bu&age=23&adresse=5 rue de la paix, paris&email=Bal@gmail.com&carteBancaire=1234567891234567```. Cette méthode retourne le Json suivant :
```json
{
    "NumeroClient": 1,
    "nom": "Bal",
    "prenom": "Bu",
    "age": 23,
    "adresse": "5 rue de la paix, paris",
    "email": "Bal@gmail.com",
    "carteBancaire": "1234567891234567",
    "created_at": "2025-02-13T09:13:07.000000Z",
    "updated_at": "2025-02-21T11:19:54.000000Z"
}
```
Pour la méthode __DELETE__, on entre l'URL ```http://lakartxela.iutbayonne.univ-pau.fr/~cdutourni001/Laravel/TD1/public/api/clients/1```, ce qui va __supprimer__ le _client 1_. Cette méthode retourne le Json suivant :
```json
{
    "message": "Client supprimé !"
}
```