<span @class([
    'badge',
    \App\Enums\Article\ArticleActiveEnum::tryFrom($activeStatus)->badge()
])>{{ \App\Enums\Article\ArticleActiveEnum::getDescription($activeStatus) }}</span>
