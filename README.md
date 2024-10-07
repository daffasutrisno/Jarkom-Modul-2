# Jarkom-Modul-2

## 1. Konfigurasi Internet dan Requirement

a. Setup Router  
b. Setup DNS  
c. Setup Client  
d. Setup Webserver

### Testcase

## 2. Domain Tiap Webserver

a. Setting Configurasi Webserver di Wortel
  - ```
    mkdir /etc/bind/jarkom
    ```
  - ```
    nano /etc/bind/named.conf.local
    ```
    ```c
    zone "bayam.F05.com" {
            type master;
            file "/etc/bind/jarkom/bayam.F05.com"
    };
    
    zone "brokoli.F05.com" {
            type master;
            file "/etc/bind/jarkom/brokoli.F05.com";
    };
    
    zone "buncis.F05.com" {
            type master;
            file "/etc/bind/jarkom/buncis.F05.com";
    };

    ```

b. Copy Template Domain
  - ```
    cp /etc/bind/db.local /etc/bind/jarkom/bayam.F05.com
    ```
  - ```
    cp /etc/bind/db.local /etc/bind/jarkom/brokoli.F05.com
    ```
  - ```
    cp /etc/bind/db.local /etc/bind/jarkom/buncis.F05.com
    ```
c. Setting Domain
  - Bayam
    ```
    nano /etc/bind/jarkom/bayam.F05.com
    ```
    ```
    ;
    ; BIND data file for local loopback interface
    ;
    $TTL    604800
    @       IN      SOA     bayam.F05.com. root.bayam.F05.com. (
                                  2         ; Serial
                             604800         ; Refresh
                              86400         ; Retry
                            2419200         ; Expire
                             604800 )       ; Negative Cache TTL
    ;
    @       IN      NS      bayam.F05.com.
    @       IN      A       10.69.2.5
    ```
    
  - Brokoli
    ```
    nano /etc/bind/jarkom/brokoli.F05.com
    ```
    ```
    ;
    ; BIND data file for local loopback interface
    ;
    $TTL    604800
    @       IN      SOA     brokoli.F05.com. root.brokoli.F05.com. (
                                  2         ; Serial
                             604800         ; Refresh
                              86400         ; Retry
                            2419200         ; Expire
                             604800 )       ; Negative Cache TTL
    ;
    @       IN      NS      brokoli.F05.com.
    @       IN      A       10.69.2.4
    ```
  - Buncis
    ```
    nano /etc/bind/jarkom/buncis.F05.com
    ```
    ```
    ;
    ; BIND data file for local loopback interface
    ;
    $TTL    604800
    @       IN      SOA     buncis.F05.com. root.buncis.F05.com. (
                                  2         ; Seri
                             604800         ; Refresh
                              86400         ; Retry
                            2419200         ; Expire
                             604800 )       ; Negative Cache TTL
    ;
    @       IN      NS      buncis.F05.com.
    @       IN      A       10.69.2.3
    ```
  - ```
    service bind9 restart
    ```

### Testcase

  - ```
    ping bayam.F05.com -c 3
    ```
  - ```
    ping brokoli.F05.com -c 3
    ```
  - ```
    ping buncis.F05.com -c 3
    ```
 
 


## 3. Domain Alias pada Bayam Webserver dan Brokoli Webserver

