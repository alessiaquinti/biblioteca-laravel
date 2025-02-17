<form action="{{ route('create-book') }}" method="post" class="space-y-4">
    @csrf

    <div>
        <label for="title" class="block font-bold">Titolo:</label>
        <input type="text" name="title" id="title" required class="w-full p-2 border rounded">
    </div>

    <div class="space-y-2">
        <div class="flex items-center space-x-2">
            <input type="checkbox" id="use_existing_author" name="use_existing_author" class="rounded">
            <label for="use_existing_author" class="font-bold">Seleziona un autore esistente</label>
        </div>

        <div id="existing_author_div" class="hidden">
            <label for="existing_author" class="block font-bold">Seleziona autore:</label>
            <select name="author_name" id="existing_author" class="w-full p-2 border rounded">
                <option value="">Scegli un autore</option>
                @php
                    $authors = DB::table('authors')->get();
                @endphp
                @foreach($authors as $author)
                    <option value="{{ $author->name }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <div id="new_author_div">
            <label for="author_name" class="block font-bold">Nuovo Autore (Nome e Cognome):</label>
            <input type="text" name="author_name" id="author_name" class="w-full p-2 border rounded">
        </div>
    </div>

    <div>
        <label for="publication_year" class="block font-bold">Anno di Pubblicazione:</label>
        <input type="number" name="publication_year" id="publication_year" required class="w-full p-2 border rounded">
    </div>

    <button type="submit" class="btn bg-teal-400 border-none">
        Aggiungi Libro
    </button>
   
</form>

<script>
    const useExistingAuthorCheckbox = document.querySelector('#use_existing_author');
    const existingAuthorDiv = document.querySelector('#existing_author_div');
    const newAuthorDiv = document.querySelector('#new_author_div');
    const existingAuthorSelect = document.querySelector('#existing_author');
    const newAuthorInput = document.querySelector('#author_name');

    useExistingAuthorCheckbox.addEventListener('change', function() {
        if (this.checked) {
            existingAuthorDiv.classList.remove('hidden');
            newAuthorDiv.classList.add('hidden');
            newAuthorInput.value = '';
            newAuthorInput.required = false;
            existingAuthorSelect.required = true;
        } else {
            existingAuthorDiv.classList.add('hidden');
            newAuthorDiv.classList.remove('hidden');
            existingAuthorSelect.value = '';
            existingAuthorSelect.required = false;
            newAuthorInput.required = true;
        }
    });
</script>
