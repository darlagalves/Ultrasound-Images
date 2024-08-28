<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'paciente_name' => 'required|string',
            'image' => 'required|image|max:2048', // Validação da imagem
        ]);

        // Obtém o nome do arquivo da imagem
        $imageName = $request->file('image')->getClientOriginalName();

        // Lê o conteúdo da imagem como dados binários
        $imageData = file_get_contents($request->file('image')->getRealPath());

        // Converte os dados binários para hexadecimal (opcional, mas pode ser útil para armazenamento)
        $hexImageData = bin2hex($imageData);

        // Salva os dados no banco de dados
        $image = new Image;
        $image->paciente_name = $request->input('paciente_name');
        $image->image_name = $imageName;
        $image->image_data = $hexImageData;
        $image->save();

        return Redirect::route('home')->with('success', 'Imagem salva com sucesso!');
    }

    public function show($id)
    {
        $image = Image::findOrFail($id); // Busca a imagem pelo ID

        // Recupera os dados da imagem do banco de dados
        $imageData = hex2bin($image->image_data);

        // Define o cabeçalho para indicar que o conteúdo é uma imagem
        header('Content-type: image/jpeg'); // Substitua 'image/jpeg' se for um formato diferente

        // Exibe os dados da imagem como resposta
        echo $imageData;
    }

    public function index()
    {
        $images = Image::all();
        return view('images.index', ['images' => $images]);
    }
}