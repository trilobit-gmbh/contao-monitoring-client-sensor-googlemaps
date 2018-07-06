Contao Extension: MonitoringClientSensorGoogleMaps
==============================================

Das MonitoringClientSensorGoogleMaps Modul ergänzt einen Sensor für die Contao-Monitoring Erweiterung mit dem Google Maps Daten ausgelesen werden können.
Das Modul funktioniert nur mit der Google Maps Erweiterung dlh_googlemaps und liest aus ob die Erweiterung installiert ist,
wie viele Karten angelegt sind und gibt die API-Keys zusammen mit der Domain der Webseitenwurzel auf denen sie eingetragen sind an.

Zu beachten ist das in der Listenansicht die Spalten "Letztes Test Datum" und "Unerledigte Aufgaben" entfernt wurden, außerdem wird in der Spalte Webseite
das http:// bzw. https:// und der Schrägstrich am Ende der URL entfernt. Die Listenansicht wird um die Spalte Google Maps ergänzt, in dieser befinden sich die Anzahl angelegten
Karten, der Status ob die dlh_googlemaps Erweiterung installiert ist und die Domain bzw. die Sprache der Webseitenwurzel und der dazugehörige API-Key.


The MonitoringClientSensorGoogleMaps module adds a sensor for the Contao-Monitoring extension with which Google Maps data can be read out.
The module only works with the google maps extension dlh_googlemaps and reads  out if the extension is installed, how many maps exist and
returns the API key together with the domain of the website root on wich they are registered.

Please note that in the list view the columns "Last test date" and "Unfinished tasks" have been removed. Also, the http:// or https:// and the slash at the end of the domain,
in the column website were removed. The list view will be added by the column Google Maps in wich the number of existing maps, the status if the dlh_googlemaps is installed and
the domain or language of the website root and the associated API key.

Installation
------------

Install the extension via composer: [trilobit-gmbh/contao-monitoring-client-sensor-googlemaps](https://packagist.org/packages/trilobit-gmbh/contao-monitoring-client-sensor-googlemaps).


Compatibility
-------------

- Contao version >= 3.5.35
- Contao version >= 4.4.20
- dlh_googlemaps >= 2.3


Dependency
----------

This extension is dependent on the following extensions:

- [[contao-monitoring/monitoring-client]](https://packagist.org/packages/contao-monitoring/monitoring-client)
