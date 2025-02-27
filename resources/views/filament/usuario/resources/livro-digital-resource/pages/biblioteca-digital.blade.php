<x-filament::page>
    <div class="p-6 space-y-6">
        <!-- Campo de Pesquisa -->
        <input type="text" id="search" onkeyup="filterBooks()" placeholder="🔍 Pesquisar livro pelo título..." class="w-full p-2 border border-gray-300 rounded-lg shadow-sm">

        @foreach ($livrosPorGenero as $genero => $livros)
            <div class="bg-gray-100 p-4 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold text-gray-700 cursor-pointer" onclick="toggleGenre('{{ Str::slug($genero) }}')">
                    {{ $genero }} ⬇️
                </h2>

                <!-- Grid Responsivo para Exibir os Livros -->
                <div id="{{ Str::slug($genero) }}" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 mt-4">
                    @foreach ($livros as $livro)
                        <div class="livro border rounded-lg p-3 shadow bg-white flex flex-col items-center hover:shadow-lg transition" data-titulo="{{ strtolower($livro['titulo']) }}">
                            <!-- Capa do Livro -->
                            <img src="{{ asset('storage/' . $livro['capa']) }}" alt="{{ $livro['titulo'] }}" class="w-full h-48 object-cover rounded">

                            <!-- Botões de Ação -->
                            <div class="mt-3 space-y-2 w-full">
                                <a href="{{ asset($livro['livro_pdf']) }}" download class="block w-full text-center bg-green-500 text-white py-1 px-3 rounded hover:bg-green-600 transition">
                                    📥 Download
                                </a>
                                <a href="{{ asset($livro['livro_pdf']) }}" target="_blank" class="block w-full text-center bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-600 transition">
                                    📖 Ler Livro
                                </a>
                                <button onclick="openModal({{ json_encode($livro) }})" class="block w-full text-center bg-gray-500 text-white py-1 px-3 rounded hover:bg-gray-600 transition">
                                    ℹ️ Ver Informações
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-11/12 md:w-2/3 lg:w-1/3">
            <h2 id="modal-title" class="text-xl font-semibold text-gray-700"></h2>
            <p id="modal-descricao" class="text-gray-600 mt-2"></p>
            <div class="mt-4">
                <p><strong>📖 Autor:</strong> <span id="modal-autor"></span></p>
                <p><strong>📚 Gênero:</strong> <span id="modal-genero"></span></p>
                <p><strong>🏢 Editora:</strong> <span id="modal-editora"></span></p>
                <p><strong>📅 Ano:</strong> <span id="modal-ano"></span></p>
            </div>
            <div class="mt-4 flex gap-2">
                <a id="modal-ler" href="#" target="_blank" class="flex-1 text-center bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition">
                    📖 Ler Livro
                </a>
                <a id="modal-download" href="#" download class="flex-1 text-center bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 transition">
                    📥 Download
                </a>
            </div>
            <button onclick="closeModal()" class="mt-4 block w-full text-center bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 transition">
                ❌ Fechar
            </button>
        </div>
    </div>

    <script>
        function openModal(livro) {
            document.getElementById('modal-title').innerText = livro.titulo;
            document.getElementById('modal-descricao').innerText = livro.descricao || 'Sem descrição disponível.';
            document.getElementById('modal-autor').innerText = livro.autor ? livro.autor.nome : 'Desconhecido';
            document.getElementById('modal-genero').innerText = livro.genero ? livro.genero.nome : 'Sem Gênero';
            document.getElementById('modal-editora').innerText = livro.editora ? livro.editora.nome : 'Desconhecida';
            document.getElementById('modal-ano').innerText = livro.ano || 'Não informado';

            document.getElementById('modal-ler').href = livro.livro_pdf ? "{{ asset('') }}" + livro.livro_pdf : '#';
            document.getElementById('modal-download').href = livro.livro_pdf ? "{{ asset('') }}" + livro.livro_pdf : '#';

            document.getElementById('modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
        }

        function filterBooks() {
            let input = document.getElementById("search").value.toLowerCase();
            let livros = document.querySelectorAll(".livro");

            livros.forEach(livro => {
                let titulo = livro.getAttribute("data-titulo");
                livro.style.display = titulo.includes(input) ? "block" : "none";
            });
        }

        function toggleGenre(genreId) {
            let element = document.getElementById(genreId);
            element.classList.toggle("hidden");
        }
    </script>
</x-filament::page>
