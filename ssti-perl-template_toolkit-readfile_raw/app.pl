use strict;
use warnings;

use Dancer2;
use Template;


get '/' => sub {
    my $greeting = "Template_toolkit";
    template 'index' => {
        greeting => $greeting
    };
};

post '/debug' => sub {
    my $input = body_parameters->get('debug');
    my $output;
    
    my $template = Template->new({
        INCLUDE_PATH => './views'
    });
    $template->process(\$input, {}, \$output) or die $template->error();
    return $output;
};

start;
