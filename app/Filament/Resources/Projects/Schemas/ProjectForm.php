<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Título')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state ?? ''))),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),
                TextInput::make('excerpt')
                    ->label('Resumo')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                Textarea::make('body')
                    ->label('Descrição')
                    ->rows(6)
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->label('Imagem')
                    ->image()
                    ->disk('public')
                    ->directory('projects'),
                TextInput::make('image_alt')
                    ->label('Texto alternativo da imagem')
                    ->helperText('Descreve a imagem para quem usa leitor de ecrã.')
                    ->requiredWith('image'),
                TagsInput::make('stack')
                    ->label('Tecnologias'),
                TextInput::make('url')
                    ->label('Link')
                    ->url(),
                Toggle::make('is_published')
                    ->label('Publicado'),
            ]);
    }
}
