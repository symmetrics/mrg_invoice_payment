* DOCUMENTATION

** INSTALLATION
Extrahieren Sie den Inhalt dieses Archivs in Ihr Magento-Verzeichnis.
Ggf. ist das Leeren/Auffrischen des Magento-Caches notwendig.

** USAGE
Dieses Modul fügt die Zahlungsmöglichkeit "Symmetrics Rechnung" hinzu,
welche Zahlung auf Rechnung ermöglicht. Die neue Zahlungsmöglichkeit
berücksichtigt die Kunden-Gruppen. Die Liste der Kundengruppen kann man
im Back-End einstellen. Dazu darf man auch die Parameter wie
'Mindestwert für Gesamtbestellung', 'Höchstwert für Gesamtbestellung',
und 'Neuer Bestellstatus' einstellen.

** FUNCTIONALITY
*** A: Es wird die neue Zahlungsmöglichkeit "Symmetrics Rechnung" im
        System hinzugefügt.
*** B: Die neue Zahlungsmöglichkeit wird nur für bestimmte Benutzergruppen
        gestattet. Die Liste der Kundengruppen für "Symmetrics Rechnung" können 
        im Back-End konfiguriert werden.
*** C: Einstellungen "Maximum Order Total" und "Minimum Order Total" können
        im Back-End konfiguriert werden.
*** D: Es gibt eine Möglichkeit, den Bestellstatus für jede neue 
        Bestellung im Back-End zu konfigurieren.
*** E: Insgesamt die folgende Optionen sind im Back-End unter 
       "System" -> "Konfiguration" -> "Verkäufe" -> "Zahlungsmöglichkeiten"
       -> "Symmetrics Rechnung" konfigurierbar:
        1. 'Aktiviert'
        2. 'Titel'
        3. 'Neuer Bestellstatus' (Sieh Punkt D)
        4. 'Zahlart für bestimmte Kundengruppen' (Sieh Punkt B)
        5. 'Mindestwert für Gesamtbestellung' (Sieh Punkt C)
        6. 'Höchstwert für Gesamtbestellung' (Sieh Punkt C)

** TECHNICAL
Es wird per config.xml und system.xml eine neue Zahlungsmöglichkeit 
hinzugefügt. Diese Methode nutzt <model>invoice/method_invoice</model>.
Dabei implementiert die verantwortliche Klasse 
Symmetrics_Invoice_Model_Method_Invoice Mage_Payment_Model_Method_Abstract. 
Keine Migrationsdatei ist nötig.

** PROBLEMS
Zur Zeit sind keine Probleme bekannt.

* TESTCASES

** BASIC
*** A: 1. Gehen Sie in die Konfiguration unter "System" -> 
           "Konfiguration" -> "Verkäufe" -> "Zahlungsmöglichkeiten"
           und prüfen Sie, ob dort auch "Symmetrics Rechnung" erscheint.
       2. (1) Stellen Sie "Aktiviert" auf "Ja", geben Sie (falls noch nicht 
           vorhanden) einen Titel ein, den Bestellstatus auf den die 
           Bestellung springen soll wenn diese Zahlungsmethode ausgewählt 
           wurde und wählen Sie die Kundengruppen aus für die diese 
           Zahlungsmethode gelten soll (zum Testen alle auswählen).
          (2) Gehen Sie ins Frontend und kaufen einen Artikel. Prüfen 
           Sie ob man diese Zahlungsmöglichkeit beim Bestellvorgang 
           auswählen kann.
          (3) Wenn der Kauf abgeschlossen ist, gehen Sie ins Backend unter 
           "Verkäufe => Bestellungen", wählen Ihre Bestellung aus und 
           prüfen, ob der Status der Bestellung dem entspricht, den Sie 
           in der Konfiguration bei Punkt A: 2. eingestellt haben.
*** B: 1. (1) Erstellen Sie eine neue Kundengruppe "Test" und einen Benutzer
           "test@example.com" für diese Gruppe.
          (2) Gehen Sie ins Frontend und kaufen einen Artikel als
           "test@example.com" Kunde ein. Prüfen Sie ob man die "Symmetrics
           Rechnung" Zahlungsmöglichkeit beim Bestellvorgang NICHT auswählen
           kann.
       2. (1) Gehen Sie in die Konfiguration unter "System" -> 
           "Konfiguration" -> "Verkäufe" -> "Zahlungsmöglichkeiten"
           -> "Symmetrics Rechnung" fügen in die neue Kundengruppe in der 
           Gruppenliste der "Symmetrics Rechnung" Zahlungsmethode hinzu.
          (2) Wiederholen Sie Punkt B.1(2), aber dieses Mal überprüfen Sie, 
           ob der Kauf mit der "Symmetrics Rechnung" Zahlungsmethode
           erfolgreich ist.
*** C: 1. (1) Gehen Sie in die Konfiguration unter "System" -> 
           "Konfiguration" -> "Verkäufe" -> "Zahlungsmöglichkeiten"
           -> "Symmetrics Rechnung" und setzen sie die Mindestwert und
           Höchstwert für Gesamtbestellung.
          (2) Ändern Sie die Werte und überprüfen dabei, dass die 
           "Symmetrics Rechnung" nur dann in "Zur Kasse" erscheint,
            wenn "Mindestwert" < "Gesamtbestellung" < Höchstwert oder
            "Mindestwert" < "Gesamtbestellung" (Falls Höchstwert nicht 
            gesetzt ist) oder, anderseits, "Höchstwert" > "Gesamtbestellung".
*** D: 1. (1) Gehen Sie in die Konfiguration unter "System" -> 
           "Konfiguration" -> "Verkäufe" -> "Zahlungsmöglichkeiten"
           -> "Symmetrics Rechnung" und ändern Sie das Feld 'Neuer Bestellstatus'.
          (2) Bestellen Sie ein Produkt und überprüfen dass der Bestellstatus
           stimmt.
*** E: 1. Für jede Option prüfen Sie ob man sie ändern und speichern kann.
