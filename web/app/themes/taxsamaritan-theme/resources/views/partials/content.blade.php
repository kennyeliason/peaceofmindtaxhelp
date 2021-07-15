<article @php(post_class('article-excerpt'))>
    <div class="bg-white overflow-hidden">
        <div class="relative max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative lg:flex lg:items-center">
                <div class="hidden lg:block lg:flex-shrink-0">
                    <a href="{{ get_permalink() }}">
                        {!! \App\nb_get_post_thumbnail(null, 'medium', ['class' => 'h-64 w-64 object-cover xl:h-80 xl:w-80']) !!}
                    </a>
                </div>
                <div class="relative lg:ml-10">
                    <div>
                        <header>
                            <h2 class="text-3xl px-0 mx-0 mb-0 entry-title">
                                <a href="{{ get_permalink() }}" class="text-brand-600">
                                    {!! $title !!}
                                </a>
                            </h2>
                            <div class="font-bold uppercase">
                                {{ get_the_date('M d, Y') }}
                            </div>
                        </header>
                        <div class="mt-4 text-sm leading-6 lg:leading-9 font-medium text-gray-900">
                            <div class="px-0 entry-summary leading-relaxed">
                                {!! wp_trim_words(get_the_excerpt(), 33) !!}
                            </div>
                        </div>
                        <footer class="mt-8">
                            <div class="flex">
                                <div class="flex-shrink-0 lg:hidden">
                                    {!! \App\nb_get_post_thumbnail(null, 'medium', ['class' => 'h-12 w-12 object-cover
                                    rounded-lg']) !!}
                                </div>
                                <div class="ml-4 lg:ml-0">
                                    <span class="inline-flex shadow-sm">
                                        <a href="{{ get_permalink() }}" type="button"
                                            class="button uppercase inline-flex items-center px-4 py-2 border border-trim-300 text-base leading-6 font-medium text-trim-500 bg-white hover:text-trim-400 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-trim-800 active:bg-gray-50 transition ease-in-out duration-150">
                                            Read Article
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
