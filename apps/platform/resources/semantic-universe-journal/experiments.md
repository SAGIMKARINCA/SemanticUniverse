# Semantic Universe Experiments

Bu dosya, bugune kadar denenen, calisan veya takilan deneylerin kaydidir.

## E-001 | Hemorrhoid pilot domain deneyi

Amac:
- hasta / protokol / form / takip tabanli pilot domain uretmek

Ne denendi:
- HTML form
- PHP webapp
- Laravel tabanli domain model

Sonuc:
- pilot domain mantigi calistirildi
- ama Semantic Universe'ten ayri bir uygulama olarak tutulmasi gerektigi netlesti

## E-002 | Semantic Universe local shell deneyi

Amac:
- semantik evrenin ana framework/shell yapisini gorsel olarak denemek

Ne denendi:
- top bar
- ribbon
- left tree nav
- center workspace
- right context panel
- bottom dock

Sonuc:
- calisan local shell kuruldu

## E-003 | God Mode shell deneyi

Amac:
- public shell ile super admin shell'i ayirmak

Ne denendi:
- session tabanli giris/cikis
- bos shell ve dolu shell ayrimi

Sonuc:
- temel mantik calisti

## E-004 | Tema ve frame davranisi paneli

Amac:
- her frame icin tema ve davranis tercihleri uretmek

Ne denendi:
- tema secimi
- frame davranisi
- Ayarlar ribbon ve panel mantigi

Sonuc:
- ilk calisan ayarlar mantigi ortaya cikti

## E-005 | GitHub merkezli SemanticUniverse repoya gecis

Amac:
- local calismayi resmi Git tabanina almak

Ne denendi:
- repo init
- remote baglama
- ilk foundation commitleri
- basit CI workflow

Sonuc:
- resmi repo aktif hale geldi

## E-006 | ZEN / Xen uzerinde Ubuntu staging VM denemesi

Amac:
- staging icin temiz Ubuntu 24.04 VM acmak

Ne denendi:
- yeni VM olusturma
- public network secimi
- ISO import

Sorunlar:
- bootable device yok
- ISO repository icinde Ubuntu ISO yok
- XO import timeout hatasi
- storage / yer sorunu ihtimali

Sonuc:
- hypervisor katmaninda ek audit ve duzgun ISO stratejisi gerektigi anlasildi

## E-007 | ZEN Server audit fazi

Amac:
- mevcut sanal ortamda neyin kritik, neyin test, neyin aday oldugunu anlamak

Ne denendi:
- VM listesi siniflandirildi
- audit checklist acildi

Sonuc:
- agresif silme yerine kontrollu audit yaklasimi benimsendi

## E-008 | Ubuntu staging uzerinde Laravel + PostgreSQL kurulum deneyi

Amac:
- SemanticUniverse icin internetten erisilebilir resmi bir staging omurgasi kurmak

Ne denendi:
- Ubuntu sunucu kurulumu
- SSH/SFTP erisimi
- `nginx`, `postgresql`, `redis-server`, `php`, `composer`
- Laravel app kurulumu ve PostgreSQL baglantisi
- Nginx vhost + DNS ile `staging.semanger.com`

Sonuc:
- calisan staging ortami ortaya cikti
- ilk acilan sayfa varsayilan Laravel karsilama ekrani oldu

## E-009 | Local shell'in Laravel Blade gorunume port edilmesi

Amac:
- daha once `local-platform/index.php` olarak duran SemanticUniverse shell'ini resmi Laravel katmanina almak

Ne denendi:
- source shell'den Blade'e donusum
- session tabanli GodMode route'lari
- mevcut stil dosyasinin Laravel public alanina alinmasi
- route cache temizligi ve route dogrulama

Sonuc:
- local shell artik Laravel icinde calisacak hale getirildi
- sonraki adim GitHub'a push ve staging'de `git pull`
