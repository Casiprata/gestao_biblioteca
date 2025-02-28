<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LivroFisicoResource\Pages;
use App\Filament\Resources\LivroFisicoResource\RelationManagers;
use App\Models\Autor;
use App\Models\Editora;
use App\Models\Genero;
use App\Models\LivroFisico;
use Faker\Provider\Image;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LivroFisicoResource extends Resource
{
    protected static ?string $model = LivroFisico::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark-square';

    protected static ?string $label = 'Livros Físicos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('titulo')
                    ->required(),
                Select::make(name: 'autor_id')
                ->label('Autor')
                    ->options(Autor::all()->pluck('nome', 'id'))
                    ->live()
                    ->required(),
                Select::make(name: 'genero_id')
                ->label('Genero')
                    ->options(  Genero::all()->pluck('nome', 'id'))
                    ->live()
                    ->required(),
                Select::make('editora_id')
                ->label('Editora')
                    ->options(  Editora::all()->pluck('nome', 'id'))
                    ->live()
                    ->required(),
                TextInput::make('edicao')
                    ->maxLength(255)
                    ->default(null),
                TextInput::make('ano')
                    ->maxLength(255)
                    ->default(null),
                TextInput::make('quantidade')
                    ->required()
                    ->numeric()
                    ->default(1),
                Select::make('destinatario')
                    ->label('Destinatários')
                    ->options([
                        'Todos'=> 'Todos',
                        'Professores'=> 'Professores',
                    ])
                    ->required(),
                Textarea::make('descricao')
                    ->columnSpanFull(),

                FileUpload::make('capa')
                ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('titulo')
                    ->searchable(),
                TextColumn::make('autor.nome')
                ->label('Autor')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('genero.nome')
                ->label('Genero')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('editora_id')
                ->label('Editora')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('edicao')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('ano')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                ImageColumn::make('capa')
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('quantidade')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                TextColumn::make('destinatario')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('estado')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('created_at')
                ->label('Data de Criação')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Data de Atualização')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->label('Editar')
                ->color('warning')
                ->icon('heroicon-o-pencil-square'),
                Tables\Actions\DeleteAction::make()
                ->label('Eliminar')
                ->color('danger')
                ->icon('heroicon-o-trash'),
                Tables\Actions\ViewAction::make()
                ->label('Ver')
                ->color('info')
                ->icon('heroicon-o-eye'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLivroFisicos::route('/'),
            'create' => Pages\CreateLivroFisico::route('/create'),
            'edit' => Pages\EditLivroFisico::route('/{record}/edit'),
        ];
    }
}
