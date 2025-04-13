export default class Errors {
    stwichErrorStatus(status) {
        switch (status) {
            case 401:
                return "Oops! Sepertinya aksesnya terbatas. Coba login atau hubungi kami untuk informasi selengkapnya.";
            case 402:
                return "Maaf, Anda perlu melakukan pembayaran terlebih dahulu. Silakan lakukan pembayaran.";
            case 403:
                return "Oops! Akses ditolak. Anda tidak memiliki izin untuk mengakses halaman ini.";
            case 404:
                return "Halaman yang diminta tidak ditemukan. Mohon periksa kembali URL yang dimasukkan.";
            case 419:
                return "Maaf, halaman telah kedaluwarsa. Silakan refresh atau coba lagi nanti.";
            case 500:
                return "Oops! Terjadi kesalahan internal pada server. Mohon coba lagi nanti.";
            case 503:
                return "Layanan tidak tersedia saat ini. Mohon coba lagi nanti atau hubungi kami.";
        }
    }
}
