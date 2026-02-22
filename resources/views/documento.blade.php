<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>IA - Extrator de PDF</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">

    <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-2xl font-bold text-blue-600 mb-4 text-center">Extrator de PDF</h1>
        
        <form action="{{ route('ia.processar') }}" method="POST" enctype="multipart/form-data" class="mb-8 p-4 border-2 border-dashed border-gray-200 rounded-lg">
            @csrf
            <label class="block text-sm font-medium text-gray-700 mb-2">Selecione o PDF:</label>
            <input type="file" name="arquivo_pdf" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            <button type="submit" class="mt-4 w-full bg-green-600 text-white py-2 rounded font-bold hover:bg-green-700">
               Ler PDF com IA
            </button>
        </form>

        <hr class="my-6">

        @if($dados)
            <div class="bg-blue-50 p-4 rounded-lg">
                <h2 class="font-bold text-blue-800 mb-2 underline">Dados Extraídos:</h2>
                <div class="space-y-3">
                    <p><strong>Nome:</strong> {{ $dados['nome'] }}</p>
                    <p><strong>Empresa:</strong> {{ $dados['empresa'] }}</p>
                    <p><strong>E-mail:</strong> <span class="text-blue-500">{{ $dados['email'] }}</span></p>
                </div>
            </div>
        @else
            <p class="text-gray-400 text-center italic">Aguardando upload de documento...</p>
        @endif
    </div>

</body>
</html>