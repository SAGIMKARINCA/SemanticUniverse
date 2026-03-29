# Semantic Universe Decisions

Bu dosya, bugune kadar alinan ana kararlarin kisa kaydıdir.

## D-001 | Semantic Universe ana ust sistemdir

Karar:
- Semantic Universe, tekil bir uygulama değil; tum alt urunleri ve sistemleri tasiyan ana ust sistemdir.

Neden:
- kullanıcınin butun urunlerini ve standartlarini tek cati altında toplamak için

## D-002 | Laravel zemin, Semantic Universe ust sistem

Karar:
- Laravel bir framework/platform zemini olarak ele alinacak
- Semantic Universe bu zemin üzerinde kurulan `System Ana Yuklenicisi` olacak

Neden:
- framework ile ust sistemi kavramsal olarak karistirmamak

## D-003 | Yazilim yasam dongusunda Spiral model kullanilacak

Karar:
- gelisim, test ve yayin akışında Spiral model esas alinacak

Neden:
- büyük, riskli ve felsefi derinligi olan bu sistem dogrusal ilerlemiyor

## D-004 | Once staging, sonra production

Karar:
- local -> GitHub -> staging -> production sirasi izlenecek

Neden:
- risk azaltmak
- AI araclariyla paylasimli test yapmak

## D-005 | PostgreSQL ana veri tabani yonu olacak

Karar:
- Semantic Universe için ana veri tabani yonu PostgreSQL

Neden:
- jsonb
- event/state/rule metadata
- yari-yapısal veri tasima kolayligi

## D-006 | God Mode ayrı, public alan ayrı

Karar:
- God Mode super admin çalışma alanlari public shell'den ayrılacak

Neden:
- super admin operasyonlari ile public deneyimi karistirmamak

## D-007 | Once kaynaklar var edilecek

Karar:
- evreni kurmanin ilk pratik adımi `Kaynaklar`

Neden:
- kullanıcınin semantik felsefesine gore evren once kaynakları var ederek kurulur

## D-008 | Ortak hafıza katmani zorunlu

Karar:
- tum isler `timeline`, `decisions`, `definitions`, `experiments` katmanlarina yazilacak

Neden:
- yapılanlar kaybolmasin
- documentary/timeline web katmani sonradan uretilebilsin

## D-009 | Staging alan adi `staging.semanger.com` olacak

Karar:
- internetten erişilebilir ilk resmi test ortamı `staging.semanger.com` altında calisacak

Neden:
- production/public alani ile gelistirme ve test alanini ayirmak

## D-010 | SemanticUniverse shell'i resmi olarak Laravel içine tasinacak

Karar:
- `local-platform` artık gecici prototip kaynak olarak kalacak
- resmi çalışan shell Laravel app içindeki route/view/public asset yapısında yurutulecek

Neden:
- GitHub, staging ve ileride production hattinda ayni uygulama omurgasini kullanmak

## D-011 | Journal web katmani şifreli gosterilecek

Karar:
- timeline, decisions, definitions ve experiments kayıtlari staging üzerinde şifre korumali bir journal sayfasında gosterilecek

Neden:
- ortak hafızayı hem korunur hem de görünür yapmak
- sonradan belgesel/timeline sunum katmanina zemin hazırlamak

## D-012 | History ayrı hosttan sunulacak

Karar:
- journal/history katmani `history.semanger.com` üzerinden ayrı bir host olarak sunulacak

Neden:
- staging atölyeyi çalışma alani olarak korurken tarihçe ve belgesel katmanina ayrı bir kimlik vermek

Sonuç:
- staging sunucuda history hostu için ayrı Nginx vhost'u hazırlandı; kalan is DNS A kaydınin `89.252.182.73`e yonlenmesi
