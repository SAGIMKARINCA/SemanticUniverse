# Semantic Universe Deneyler Kaydı

Bu dosya, bugüne kadar denenen, çalışan veya takılan deneylerin kaydını tutar.

## E-001 | Hemorrhoid pilot alan deneyi

Amaç:
- Hasta/protokol/form/takip tabanlı pilot alan üretmek.

Ne denendi:
- HTML form yapısı.
- PHP web uygulaması.
- Laravel tabanlı alan modeli.

Sonuç:
- Pilot alan mantığı çalıştırıldı.
- Ancak bunun Semantic Universe'ten ayrı bir uygulama olarak tutulması gerektiği netleşti.

## E-002 | Semantic Universe yerel kabuk deneyi

Amaç:
- Semantik evrenin ana çerçeve/kabuk yapısını görsel olarak denemek.

Ne denendi:
- Üst bar.
- Şerit.
- Sol ağaç menü.
- Orta çalışma alanı.
- Sağ bağlam paneli.
- Alt dock.

Sonuç:
- Çalışan yerel kabuk kuruldu.

## E-003 | Tanrı Modu kabuk deneyi

Amaç:
- Genel kabuk ile süper admin kabuğunu ayırmak.

Ne denendi:
- Session tabanlı giriş/çıkış.
- Boş kabuk ve dolu kabuk ayrımı.

Sonuç:
- Temel mantık çalıştı.

## E-004 | Tema ve çerçeve davranışı paneli

Amaç:
- Her çerçeve için tema ve davranış tercihleri üretmek.

Ne denendi:
- Tema seçimi.
- Çerçeve davranışı.
- Ayarlar ribbon ve panel mantığı.

Sonuç:
- İlk çalışan ayarlar mantığı ortaya çıktı.

## E-005 | GitHub merkezli SemanticUniverse repo geçişi

Amaç:
- Yerel çalışmayı resmî Git tabanına almak.

Ne denendi:
- Repo init.
- Remote bağlama.
- İlk foundation commit'leri.
- Basit CI iş akışı.

Sonuç:
- Resmî repo aktif hâle geldi.

## E-006 | ZEN/Xen üzerinde Ubuntu staging VM denemesi

Amaç:
- Staging için temiz Ubuntu 24.04 VM açmak.

Ne denendi:
- Yeni VM oluşturma.
- Public network seçimi.
- ISO import.

Sorunlar:
- Bootable device yoktu.
- ISO repository içinde Ubuntu ISO yoktu.
- XO import timeout hatası görüldü.
- Storage/yer sorunu ihtimali oluştu.

Sonuç:
- Hypervisor katmanında ek audit ve düzgün ISO stratejisi gerektiği anlaşıldı.

## E-007 | ZEN Server audit fazı

Amaç:
- Mevcut sanal ortamda neyin kritik, neyin test, neyin aday olduğunu anlamak.

Ne denendi:
- VM listesi sınıflandırıldı.
- Audit checklist açıldı.

Sonuç:
- Agresif silme yerine kontrollü audit yaklaşımı benimsendi.

## E-008 | Ubuntu staging üzerinde Laravel + PostgreSQL kurulum deneyi

Amaç:
- SemanticUniverse için internetten erişilebilir resmî bir staging omurgası kurmak.

Ne denendi:
- Ubuntu sunucu kurulumu.
- SSH/SFTP erişimi.
- `nginx`, `postgresql`, `redis-server`, `php`, `composer`.
- Laravel uygulaması kurulumu ve PostgreSQL bağlantısı.
- Nginx vhost + DNS ile `staging.semanger.com`.

Sonuç:
- Çalışan staging ortamı ortaya çıktı.
- İlk açılan sayfa varsayılan Laravel karşılama ekranı oldu.

## E-009 | Yerel kabuğun Laravel Blade görünümüne taşınması

Amaç:
- Daha önce `local-platform/index.php` olarak duran SemanticUniverse kabuğunu resmî Laravel katmanına almak.

Ne denendi:
- Kaynak kabuktan Blade'e dönüşüm.
- Session tabanlı Tanrı Modu rotaları.
- Mevcut stil dosyasının Laravel public dizinine alınması.
- Rota önbelleği temizliği ve rota doğrulama.

Sonuç:
- Yerel kabuk artık Laravel içinde çalışacak hâle getirildi.
- Sonraki adım GitHub'a push ve staging'de `git pull` oldu.

## E-010 | Tarihçe hostu için CWP + staging otomasyon deneyi

Amaç:
- `tarihçe.semanger.com` hostunu tarihçe/zaman çizgisi katmanına yönlendirmek.

Ne denendi:
- CWP kullanıcı panelinde HTTP oturumu açıp DNS editörüne otomatik erişim.
- Staging sunucuda Posh-SSH ile Nginx vhost yazımı, symlink, reload ve host başlığı testleri.
- Staging uygulamasını GitHub'dan çekip tarihçe rotaları ve izinleri senkronize etmek.

Sonuç:
- CWP DNS editör otomasyonu kararsız davrandı ve kayıt ekleme tam otomatik tamamlanamadı.
- Buna karşılık staging sunucuda tarihçe hostu başarıyla hazırlandı; host başlığı testinde `tarihçe.semanger.com/semantic-universe/tarihçe` 200 dönmeye başladı.

## E-011 | Tarihçe DNS kaydının manuel tamamlanması

Amaç:
- `tarihçe.semanger.com` hostunu staging tarihçe katmanına gerçek DNS kaydıyla bağlamak.

Ne denendi:
- CWP DNS zone ekranında `tarihçe.semanger.com` için `A` kaydı manuel olarak eklendi.
- Hedef IP olarak `89.252.182.73` kullanıldı.

Sonuç:
- Otomasyonla takılan son adım manuel tamamlandı.
- Artık doğrulama ve yayılım süresi kontrolü kaldı.

## E-012 | Ortak hafıza yazım standardı düzeltme deneyi

Amaç:
- Ortak hafıza dosyalarındaki küçük harf, imla ve noktalama bozulmalarını temizlemek.

Ne denendi:
- Zaman çizgisi, kararlar, tanımlar ve deney içerikleri Türkçe yazım standardına göre yeniden düzenlendi.
- Detay dosyaları aynı standartla yeniden üretildi.
- Yazım standardı karar ve tanım katmanlarına işlendi.

Sonuç:
- Tarihçe görünümündeki metinler daha okunur, tutarlı ve kurumsal bir yazım düzenine kavuştu.
