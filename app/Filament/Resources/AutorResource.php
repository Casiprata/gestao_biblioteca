<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AutorResource\Pages;
use App\Filament\Resources\AutorResource\RelationManagers;
use App\Models\Autor;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AutorResource extends Resource
{
    protected static ?string $model = Autor::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $label = 'Autores';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nome')
                    ->required(),
                TextInput::make('nacionalidade'),
                Textarea::make('descricao')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('nome')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('nacionalidade')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Data de Criação')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
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
            'index' => Pages\ListAutors::route('/'),
            'create' => Pages\CreateAutor::route('/create'),
            'edit' => Pages\EditAutor::route('/{record}/edit'),
        ];
    }
}
