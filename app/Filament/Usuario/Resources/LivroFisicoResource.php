<?php

namespace App\Filament\Usuario\Resources;

use App\Filament\Usuario\Resources\LivroFisicoResource\Pages;
use App\Filament\Usuario\Resources\LivroFisicoResource\RelationManagers;
use App\Models\LivroFisico;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LivroFisicoResource extends Resource
{
    protected static ?string $model = LivroFisico::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark-square';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeTooltip(): ?string
    {
        return 'Livros Físicos';
    }

    public static function shouldRegisterNavigation(): bool
{
    return false;
}

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListLivroFisicos::route('/'),
            'create' => Pages\CreateLivroFisico::route('/create'),
            'edit' => Pages\EditLivroFisico::route('/{record}/edit'),
            'biblioteca-fisica' => Pages\BibliotecaFisica::route('/biblioteca-fisica'),
        ];
    }
}
