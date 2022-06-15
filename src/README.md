Deployment

.JS Builden 

.kopier die das Build Result ins Laravel nach /home/maggus/stageHand_php/src/public/assets

.entnehme aus der index.html die package number -> 'src="/stageHand_php/src/public/assets/app.prod.bundle.js?ec33b66f92302cb4ce45"' ab dem '?' und in der Env.prod unter JS_PACKAGE_NUMBER hinterlegen. Der wert wird nie direkt aus der env bezogen, also ist sie eine hilfestellung für die globale suche im projekt. 

.die '/home/maggus/stageHand_php/src/resources/views/welcomeProd.blade.php' mit dem inhalt der index.html aus den assets ersetzen, da hier der pfad '/stageHand_php/src/public/assets/' richtig gesetzt ist

.open wsl in explorer -> auf der wsl ->$ explorer.exe . oder '\\wsl$\Ubuntu-20.04\home\maggus\stageHand_php\src' im explorer direkt

.den stagehand_php komplett ersetzen -> dafür das gesamte php packen und paralellel eine bkp zip von dem ordner machen

.env.prod auf .env umbenennen

.auf dem server in der '/domains/dirtyronin.eu/public_html/stagehand/index.html' die package numbers angleichen

.Deployed wird gegen 'https://www.hostinger.de/'
 -Registriert per Google Account
 - FileManager per UI oder 'https://nl-files.hostinger.de/' verwendet