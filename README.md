## Jarkom-Modul-2

# 1. Konfigurasi Internet

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
  
  - 
