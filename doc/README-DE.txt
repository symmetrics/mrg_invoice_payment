* DOCUMENTATION

** INSTALLATION
Extrahieren Sie den Inhalt dieses Archivs in Ihr magento Verzeichnis.
Die Verzeichnisstruktur ist bereits auf die des Magentoverzeichnisses
angepasst. Auch die benötigte Konfigurationsdatei um das Modul zu
aktivieren ist bereits in diesem Archiv enthalten. Ggf. ist das
Leeren/Auffrischen des Magento-Caches notwendig.

** USAGE
Dieses Modul fügt die Zahlungsmöglichkeit "Symmetrics Invoice" hinzu,
was Zahlung auf Rechnung ermöglicht.

** FUNCTIONALITY
*** A: Es wird die neue Zahlungsmöglichkeit "Symmetrics Invoice" im
        System hinzugefügt.

** TECHNICAL
Es wird per config.xml und system.xml eine neue Zahlungsmöglichkeit 
hinzugefügt. Diese Methode nutzt <model>invoice/method_invoice</model>.
Dabei die verantwortliche Klasse Symmetrics_Invoice_Model_Method_Invoice 
implementiert Mage_Payment_Model_Method_Abstract. Kein Migrationsdatei 
ist nötig.

** PROBLEMS
keine bekannt.

* TESTCASES

** BASIC
*** A:	1. Gehen Sie in die Konfiguration unter 
            "Zahlungsmöglichkeiten" und prüfen Sie ob dort auch 
            "Symmetrics Invoice" erscheint.
        2. (1) Stellen Sie "Aktiviert" auf "Ja", geben Sie (falls noch nicht 
            vorhanden) einen Titel ein, den Bestellstatus auf den die 
            Bestellung springen soll wenn diese Zahlungsmethode ausgewählt 
            wurden, und wählen Sie die Kundengruppen aus für die diese 
            Zahlungsmethode gelten soll (zum testen alle auswählen).
           (2) Gehen Sie ins Frontend und kaufen einen Artikel. Prüfen 
            Sie ob man diese Zahlungsmöglichkeit beim Bestellvorgang 
            auswählen kann.
           (3) Wenn der Kauf abgeschlossen ist, gehen Sie ins Backend unter 
            "Verkäufe => Bestellungen", wählen ihre Bestellung aus und 
            prüfen ob der Status der Bestellung dem entspricht, den Sie 
            in der Konfiguration bei Punkt A: 2. eingestellt haben.

