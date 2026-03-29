# Semantic Universe Experiments

Bu dosya, bugune kadar denenen, çalışan veya takilan deneylerin kaydıdir.

## E-001 | Hemorrhoid pilot domain deneyi

Amac:
- hasta / protokol / form / takip tabanlı pilot domain uretmek

Ne denendi:
- HTML form
- PHP webapp
- Laravel tabanlı domain model

Sonuç:
- pilot domain mantığı calistirildi
- ama Semantic Universe'ten ayrı bir uygulama olarak tutulmasi gerektigi netleşti

## E-002 | Semantic Universe local shell deneyi

Amac:
- semantik evrenin ana framework/shell yapısıni görsel olarak denemek

Ne denendi:
- top bar
- ribbon
- left tree nav
- center workspace
- right context panel
- bottom dock

Sonuç:
- çalışan local shell kuruldu

## E-003 | God Mode shell deneyi

Amac:
- public shell ile super admin shell'i ayirmak

Ne denendi:
- session tabanlı giriş/çıkış
- boş shell ve dolu shell ayrımi

Sonuç:
- temel mantik calisti

## E-004 | Tema ve frame davranışi paneli

Amac:
- her frame için tema ve davranış tercihleri uretmek

Ne denendi:
- tema secimi
- frame davranışi
- Ayarlar ribbon ve panel mantığı

Sonuç:
- ilk çalışan ayarlar mantığı ortaya cikti

## E-005 | GitHub merkezli SemanticUniverse repoya geçiş

Amac:
- local çalışmayi resmi Git tabanina almak

Ne denendi:
- repo init
- remote baglama
- ilk foundation commitleri
- basit CI workflow

Sonuç:
- resmi repo aktif hale geldi

## E-006 | ZEN / Xen üzerinde Ubuntu staging VM denemesi

Amac:
- staging için temiz Ubuntu 24.04 VM acmak

Ne denendi:
- yeni VM olusturma
- public network secimi
- ISO import

Sorunlar:
- bootable device yok
- ISO repository içinde Ubuntu ISO yok
- XO import timeout hatasi
- storage / yer sorunu ihtimali

Sonuç:
- hypervisor katmaninda ek audit ve duzgun ISO stratejisi gerektigi anlasildi

## E-007 | ZEN Server audit fazı

Amac:
- mevcut sanal ortamda neyin kritik, neyin test, neyin aday oldugunu anlamak

Ne denendi:
- VM listesi sınıflandirildi
- audit checklist açıldı

Sonuç:
- agresif silme yerine kontrollu audit yaklasimi benimsendi

## E-008 | Ubuntu staging üzerinde Laravel + PostgreSQL kurulum deneyi

Amac:
- SemanticUniverse için internetten erişilebilir resmi bir staging omurgasi kurmak

Ne denendi:
- Ubuntu sunucu kurulumu
- SSH/SFTP erisimi
- `nginx`, `postgresql`, `redis-server`, `php`, `composer`
- Laravel app kurulumu ve PostgreSQL baglantisi
- Nginx vhost + DNS ile `staging.semanger.com`

Sonuç:
- çalışan staging ortamı ortaya cikti
- ilk açılan sayfa varsayilan Laravel karsilama ekranı oldu

## E-009 | Local shell'in Laravel Blade görünüme port edilmesi

Amac:
- daha once `local-platform/index.php` olarak duran SemanticUniverse shell'ini resmi Laravel katmanina almak

Ne denendi:
- source shell'den Blade'e donusum
- session tabanlı GodMode route'lari
- mevcut stil dosyasinin Laravel public alanina alinmasi
- route cache temizligi ve route dogrulama

Sonuç:
- local shell artık Laravel içinde calisacak hale getirildi
- sonraki adım GitHub'a push ve staging'de `git pull`

## E-010 | Tarihçe hostu için CWP + staging otomasyon deneyi

Amac:
- `history.semanger.com` hostunu journal/timeline katmanina yonlendirmek

Ne denendi:
- CWP kullanıcı panelinde HTTP oturumu acip DNS editor'e otomatik erisim denendi
- staging sunucuda Posh-SSH ile Nginx vhost yazimi, symlink, reload ve host-header testleri yapıldi
- staging uygulamasi GitHub'dan cekilip journal route'lari ve izinler senkronize edildi

Sonuç:
- CWP DNS editor otomasyonu kararsiz davrandi ve kayıt ekleme tam otomatik tamamlanamadi
- buna karsilik staging sunucuda history hostu basariyla hazırlandı; host-header testinde `history.semanger.com/semantic-universe/journal` 200 donmeye basladi

## E-011 | History DNS kaydınin manuel tamamlanmasi

Amac:
- `history.semanger.com` hostunu staging journal katmanina gercek DNS kaydıyla baglamak

Ne denendi:
- CWP DNS zone ekranında `history.semanger.com` için `A` kaydı manuel olarak eklendi
- hedef IP olarak `89.252.182.73` kullanildi

Sonuç:
- otomasyonla takilan son adım manuel tamamlandi
- artık dogrulama ve yayilim suresi kontrolu kaldi

## History kayıt kimligi deneyi

- Timeline kayıtlari için gun ici sira temelli SUH-YYYYMMDD-XX kimlik semasi denendi
- Her kimlik için ayrı markdown detay dosyasi uretilip popup katmanina baglandi
- Bu yapı daha sonra konuşma parcaciklari, karar baglari ve ekran notlariyla zenginlestirilebilir
