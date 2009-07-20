* DOCUMENTATION

** INSTALLATION
Extrahieren Sie den Inhalt dieses Archivs in Ihr magento Verzeichnis. Die Verzeichnisstruktur ist bereits auf die des Magentoverzeichnisses angepasst.
Auch die benötigte Konfigurationsdatei um das Modul zu aktivieren ist bereits in diesem Archiv enthalten.
Ggf. ist das Leeren/Auffrischen des Magento-Caches notwendig.

** USAGE
Dieses Modul fügt die Zahlungsmöglichkeit "Symmetrics Invoice" hinzu, was Zahlung auf Rechnung ermöglicht.

** FUNCTIONALITY
*** A: Es wird die neue Zahlungsmöglichkeit im System hinzugefügt.

** TECHNINCAL
Es wird per system.xml eine neue Zahlungsmöglichkeit hinzugefügt.

** PROBLEMS
keine bekannt.

* TESTCASES

** BASIC
*** A:	1. Gehen sie in die Konfiguration unter "Zahlungsmöglichkeiten" und prüfen sie ob dort auch "Symmetrics Invoice" erscheint.
        2. Stellen sie "Aktiviert" auf "Ja", geben sie (falls noch nicht vorhanden) einen Titel ein, den Bestellstatus auf den die Bestellung springen soll wenn diese Zahlungsmethode ausgewählt wurde, und wählen sie die Kundengruppen aus für die diese Zahlungsmethode gelten soll (zum testen alle auswählen).
    B:  1. Gehen sie ins Frontend und kaufen sie einen Artikel. Prüfen sie ob man diese Zahlungsmöglichkeit beim Bestellvorgang auswählen kann.
        2. Wenn der Kauf abgeschlossen ist, gehen sie ins Backend unter "Verkäufe => Bestellungen", wählen sie ihre Bestellung aus und prüfen sie ob der Status der Bestellung dem entspricht, den sie in der Konfiguration bei Punkt A: 2. eingestellt haben.

** CATCHABLE


** STRESS
*** A:	unknown
