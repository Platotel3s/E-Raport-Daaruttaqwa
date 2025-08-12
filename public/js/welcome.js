function switchTab(tab) {
            document.getElementById('login-tab').classList.remove('active-tab', 'text-primary-500');
            document.getElementById('login-tab').classList.add('text-gray-500');
            document.getElementById('register-tab').classList.remove('active-tab','text-primary-500');
            document.getElementById('register-tab').classList.add('text-gray-500');
            document.getElementById(`${tab}-tab`).classList.add('active-tab', 'text-primary-500');
            document.getElementById(`${tab}-tab`).classList.remove('text-gray-500');
             document.getElementById('login-form').classList.add('hidden');
            document.getElementById('register-form').classList.add('hidden');
            document.getElementById(`${tab}-form`).classList.remove('hidden');
        }