<?php

namespace App\Filament\Usuario\Resources;

use App\Filament\Usuario\Resources\LivroDigitalResource\Pages;
use App\Filament\Usuario\Resources\LivroDigitalResource\RelationManagers;
use App\Models\LivroDigital;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
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
                Forms\Components\TextInput::make('titulo')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('autor_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('genero_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('editora_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('edicao')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('ano')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('qtd_pagnas')
                    ->required()
                    ->numeric()
                    ->default(1),
                Forms\Components\TextInput::make('destinatario')
                    ->required(),
                Forms\Components\TextInput::make('capa')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('livro_pdf')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('descricao')
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('titulo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('autor_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('genero_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('editora_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('edicao')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ano')
                    ->searchable(),
                Tables\Columns\TextColumn::make('qtd_pagnas')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('destinatario'),
                Tables\Columns\TextColumn::make('capa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('livro_pdf')
                    ->searchable(),
                Tables\Columns\TextColumn::make('descricao')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'biblioteca-digital' => Pages\BibliotecaDigital::route('/biblioteca-digital'),
        ];
    }
}
