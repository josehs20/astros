<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;

class Atendente extends Model
{
    protected $table = 'atendentes';

    protected $fillable = [
        'nome',
        'usuario_id',
        'foto',
        'tel',
        'preco',
        'descricao',
        'comissao'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function uploadFoto($request)
    {
        // Verificar se há arquivo de foto e fazer o upload
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            // Criação do ImageManager com o driver GD
            $manager = new ImageManager(new Driver());

            // read image from file system
            $image = $manager->read($request->foto);

            // resize image proportionally to 300px width
            $image->scale(width: 300);

            $imagemNome = $this->usuario_id . '-perfil.'. $request->foto->getClientOriginalExtension();

            // Definir o caminho para armazenar a imagem
            $path = public_path('storage/uploads/atendentes/' . $this->usuario_id);

            // Verifica se o diretório existe, se não, cria o diretório
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            // Salva a imagem no diretório especificado
            $image->save($path . '/' . $imagemNome);

            // Atualiza o caminho da foto no banco de dados
            $this->foto = 'storage/uploads/atendentes/' . $this->usuario_id . '/' . $imagemNome;
        }

        // Salva os dados do atendente no banco de dados
        $this->save();
    }
}
