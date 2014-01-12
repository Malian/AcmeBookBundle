``` yaml
app/config/routing.yml


author_new:
    pattern: /author/new
    methods: [GET, POST]
    defaults:
        _controller: AcmeBookBundle:Author:new

author_update:
    pattern: /author/{id}
    methods: [GET, POST]
    defaults:
        _controller: AcmeBookBundle:Author:update

```

1) Add an author with several books.
2) Update author.
3) Notice that books disappeared.