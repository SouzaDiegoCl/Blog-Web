select * from blog 
INNER JOIN bloginfo ON blog_bloginfo_codigo = bloginfo_codigo 
INNER JOIN blogimgs ON blog_blogimgs_codigo = blogimgs_codigo
INNER JOIN usuario ON blog_usuario_codigo = usuario_codigo where blog_codigo = 1;

SELECT * from blog where blog_codigo = 1;