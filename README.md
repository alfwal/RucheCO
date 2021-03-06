# RucheCO

Projet de balances connectées pour le pesage de ruches, transmission des données toutes les 25 min via le réseau Sigfox, 

# Le fonctionnement

Un arduino Mega va lire toutes les 25 min le poids de 6 balances ainsi que la température et l'humidité ambiante. 
Une fois l'acquisition des données OK, les données sont envoyées à un serveur (backend) via le réseau Sigfox.

la partie Backend permet de gérer l'acquisition des données, la gestion des notifications et le rendu utilisateur.


# Fonctionnalités :

<p>Alerte mail lors d'un essaimage.</p>
<p>Alerte mail lors du soulevement d'une ruche (A venir).</p>
<p>Alerte mail lors d'atteinte d'un poids trop faible.</p>
<p>Alerte mail lorsqu'une hausse est pleine.</p>
<p>Alerte miéllée en cours</p>

<b>Les fonctionnalitées de l'interface utilisateur : </b>

indicateurs de progression de miellée sur 7 jours glissants

Graphique poids

Suivi de remplissage des hausses

Prise de note lors des visites avec ajout de photos

Activation ou désactivation des alertes (Essaimage, poids faible...) pour éviter d'être spammé

Exemple de l'interface ici : http://agarde.hd.free.fr/form/index.php?rucheid=1

# Le matériel 

Arduino Mega : Microcontrolleur 

DS3231 : Horloge RTC avec fonction d'alarme pour réveil et mise en veille de l'arduino.

HX711 : amplificateur pour les balances

HBM PW2C : capteur de poids

DHT22 : Capteur de temperature


# Schéma Arduino:

<img src="Backend/UI/images/Projet_Global_Sigfox_mega_schma.png"/>

# Le backend:
<b>à heberger sur un serveur WEB</b>

<b>Dossier WS : </b> Le fichier get.php agit comme webservice pour le callback SigFox

<b>Dossier UI : </b> Interface utilisateur 

<b>Dossier BDD : </b> Script SQL pour créer la base de données

<b>Sigfox et callBack : </b>


<p>custo payload Sigfox : <code> trame::int:8 temp::int:16:little-endian humidity::uint:16:little-endian w1::uint:16:little-endian w2::uint:16:little-endian w3::uint:16:little-endian </code></p>

Url pattern :

http://yourserver/get.php?trame={customData#trame}&w1={customData#w1}&w2={customData#w2}&w3={customData#w3}&humidity={customData#humidity}&temp={customData#temp}