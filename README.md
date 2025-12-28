# Analisis Perbandingan Algoritma Dijkstra Menggunakan Pendekatan Rekursif dan Iteratif dalam Penentuan Jarak Terpendek

Tugas Besar Mata Kuliah **Analisis Kompleksitas Algoritma**.

## Deskripsi Proyek
Proyek ini bertujuan untuk menganalisis dan membandingkan efisiensi performa algoritma Dijkstra dalam mencari lintasan terpendek pada sebuah graf. Perbandingan difokuskan pada dua pendekatan implementasi utama:
1.  **Pendekatan Iteratif**: Menggunakan struktur data *priority queue* (min-heap) dengan perulangan standar.
2.  **Pendekatan Rekursif**: Mengimplementasikan logika pencarian jalur terpendek melalui pemanggilan fungsi rekursif.

## Tujuan Analisis
- Membandingkan waktu eksekusi (*running time*) antara metode iteratif dan rekursif.
- Menganalisis penggunaan memori (*stack memory*) pada pendekatan rekursif dibandingkan iteratif.
- Membuktikan kompleksitas waktu teoritis $O((V + E) \log V)$ dalam implementasi praktis.

## Struktur Kode
- `app.py`: Script utama untuk menjalankan pengujian dan perbandingan performa.
- `data`: Dataset graf dalam bentuk matriks ketetanggaan atau daftar ketetanggaan.

## Analisis Kompleksitas
| Aspek | Iteratif | Rekursif |
|-------|----------|----------|
| **Time Complexity** | $O((V + E) \log V)$ | $O((V + E) \log V)$ |
| **Space Complexity** | $O(V)$ | $O(V + \text{Recursion Depth})$ |
| **Kelebihan** | Lebih hemat memori, aman untuk graf besar. | Kode lebih deklaratif. |
| **Kekurangan** | Logika perulangan lebih kompleks. | Berisiko *stack overflow* pada graf dengan kedalaman tinggi. |

## Kontributor
- **Darel Ajni Fahrezi** - (103012580009)
- **Dzaki Alwan Firjatullah** - (103012580006)
- **Yasser Abdulah Ramadhan** - (103012580039)
