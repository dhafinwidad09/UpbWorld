 // Form submission
        document.getElementById('feedback-form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Terima kasih atas kritik dan saran Anda! Kami akan memproses masukan Anda.');
            this.reset();
        });