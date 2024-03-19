const searchInput = document.getElementById('searchInput');
        const suggestionsList = document.getElementById('suggestionsList');

        const suggestions = [
            { term: 'Grammar', link: 'file:///C:/xampp/htdocs/Englishconvo/grammar.html' },
            { term: 'adjective', link: 'file:///C:/xampp/htdocs/Englishconvo/adjective.html' },
            { term: 'adverb', link: 'file:///C:/xampp/htdocs/Englishconvo/adverb.html' },
            { term: 'chatbot', link: 'file:///C:/xampp/htdocs/Englishconvo/chatbot.html' },
            // Add more suggestions as needed
        ];

        searchInput.addEventListener('input', debounce(handleInput, 300));

        function handleInput() {
            const query = searchInput.value.trim().toLowerCase();

            // Clear previous suggestions
            suggestionsList.innerHTML = '';

            // Filter and display suggestions
            const filteredSuggestions = suggestions.filter(suggestion =>
                suggestion.term.toLowerCase().includes(query)
            );

            filteredSuggestions.forEach(suggestion => {
                const li = document.createElement('li');
                const link = document.createElement('a');
                link.textContent = suggestion.term;
                link.href = suggestion.link;
                li.appendChild(link);
                suggestionsList.appendChild(li);
            });
        }

        function debounce(func, delay) {
            let timeoutId;
            return function () {
                const context = this;
                const args = arguments;
                clearTimeout(timeoutId);
                timeoutId = setTimeout(() => {
                    func.apply(context, args);
                }, delay);
            };
        }