<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LivroDigitalResource\Pages;
use App\Filament\Resources\LivroDigitalResource\RelationManagers;
use App\Models\Autor;
use App\Models\Editora;
use App\Models\Genero;
use App\Models\LivroDigital;
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

class LivroDigitalResource extends Resource
{
    protected static ?string $model = LivroDigital::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('titulo')
                    ->required()
                    ->maxLength(255),
                Select::make(name: 'autor_id')
                ->label('Autor')
                    ->options(Autor::all()->pluck('nome', 'id'))
                    ->live()
                    ->required(),
                Select::make(name: 'genero_id')
                ->label('Gênero')
                    ->options(Genero::all()->pluck('nome', 'id'))
                    ->live()
                    ->required(),
                Select::make(name: 'editora_id')
                ->label('Editora')
                    ->options(Editora::all()->pluck('nome', 'id'))
                    ->live()
                    ->required(),
                TextInput::make('edicao')
                    ->maxLength(255)
                    ->default(null),
                TextInput::make('ano')
                    ->maxLength(255)
                    ->default(null),
                TextInput::make('qtd_pagnas')
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
                    ->required(),
                FileUpload::make('livro_pdf')
                    ->acceptedFileTypes(['application/pdf'])
                    ->required(),
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
                    ->label('Gênero')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('editora.nome')
                    ->label('Editora')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('edicao')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('ano')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('qtd_pagnas')
                    ->numeric()
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('destinatario')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                ImageColumn::make('capa')
                ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListLivroDigitals::route('/'),
            'create' => Pages\CreateLivroDigital::route('/create'),
            'edit' => Pages\EditLivroDigital::route('/{record}/edit'),
           // 'biblioteca-digital' => Pages\BibliotecaDigital::route('/biblioteca-digital'),
        ];
    }
}
