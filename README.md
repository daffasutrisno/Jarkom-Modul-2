## Jarkom-Modul-2

# 1. Konfigurasi Internet dan Requirement

  a. Setup Router
  b. Setup DNS
  c. Setup Client
  d. Setup Webserver

# 2. Domain Tiap Webserver

a. Setting Configurasi di Wortel
  - ```
    mkdir /etc/bind/jarkom
    ```
  - ```
    nano /etc/bind/named.conf.local
    ```

    ```c
    zone "bayam.F05.com" {
        type master;
        file "/etc/bind/Jarkom/bayam.F05.com";
    };
    
    zone "brokoli.F05.com" {
            type master;
            file "/etc/bind/Jarkom/brokoli.F05.com";
    };
    
    zone "buncis.F05.com" {
            type master;
            file "/etc/bind/Jarkom/buncis.F05.com";
    };

    ```
  
  - ```
    cp /etc/bind/db.local /etc/bind/jarkom/bayam.F05.com
    ```
  - ```
    cp /etc/bind/db.local /etc/bind/jarkom/brokoli.F05.com
    ```
  - ```
    cp /etc/bind/db.local /etc/bind/jarkom/buncis.F05.com
    ```
