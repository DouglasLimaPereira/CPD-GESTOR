<?php

namespace Database\Seeders;

use App\Models\Errositef;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ErrositefTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $erros = [
            [
                'codigo' => '00',
                'titulo' => 'Transação Nacional Autorizada com sucesso',
                'descricao' => 'N/A',
                'retentativa' => null
            ],
            [
                'codigo' => '01',
                'titulo' => 'Transação referida pelo emissor',
                'descricao' => 'Oriente o portador a contatar o emissor do cartão',
                'retentativa' => 0
            ],
            [
                'codigo' => '02',
                'titulo' => 'Transação referida pelo',
                'descricao' => 'Oriente o portador a contatar o emissor do cartão',
                'retentativa' => 0
            ],
            [
                'codigo' => '03',
                'titulo' => 'Não foi encontrada a transação',
                'descricao' => 'Este erro pode ser: * número de parcelas ultrapassa o permitido. * código de segurança inválido * número do cartão inválido * instabilidade no sistema da adquirente',
                'retentativa' => 1
            ],
            [
                'codigo' => '04',
                'titulo' => 'Cartão com restrição',
                'descricao' => 'Oriente o portador a contatar o emissor do cartão (Problemas com o cartão)',
                'retentativa' => 0
            ],
            [
                'codigo' => '05',
                'titulo' => 'Transação não autorizada',
                'descricao' => 'Oriente o portador a contatar o emissor do cartão (não autorizada pelo emissor)',
                'retentativa' => 0
            ],
            [
                'codigo' => '06',
                'titulo' => 'Tente novamente',
                'descricao' => 'Problemas ocorridos na transação eletrônica, instabilidade da adquirente.',
                'retentativa' => 1
            ],
            [
                'codigo' => '07',
                'titulo' => 'Cartão com restrição',
                'descricao' => 'Oriente o portador a contatar o emissor do cartão (Problemas com o cartão)',
                'retentativa' => 0
            ],
            [
                'codigo' => '08',
                'titulo' => 'Código de segurança inválido',
                'descricao' => 'O código de segurança foi informado errado no momento da compra',
                'retentativa' => 0
            ],
            [
                'codigo' => '10',
                'titulo' => 'Não é permitido o envio do cartão',
                'descricao' => 'Adquirente está com os serviços instáveis, caso o erro continue ocorrendo entre em contato com nosso suporte técnico',
                'retentativa' => 0
            ],
            [
                'codigo' => '11',
                'titulo' => 'Transação Internacional Autorizada com sucesso',
                'descricao' => 'N/A',
                'retentativa' => 0
            ],
            [
                'codigo' => '12',
                'titulo' => 'Transação Inválida',
                'descricao' => 'Venda não autorizada pelo banco emissor do cartão. Cartão informado no momento da compra está incorreto',
                'retentativa' => 0
            ],
            [
                'codigo' => '13',
                'titulo' => 'Valor inválido',
                'descricao' => 'Verifique valor mínimo de R$5,00 para parcelamento',
                'retentativa' => 0
            ],
            [
                'codigo' => '14',
                'titulo' => 'Cartão inválido',
                'descricao' => 'N/A',
                'retentativa' => 0
            ],
            [
                'codigo' => '15',
                'titulo' => 'Emissor inválido',
                'descricao' => 'Emissor sem comunicação.',
                'retentativa' => 0
            ],
            [
                'codigo' => '19',
                'titulo' => 'Refaça a transação ou tente novamente mais tarde.',
                'descricao' => 'Não foi possível processar a transação. Refaça a transação ou tente novamente mais tarde',
                'retentativa' => 1
            ],
            [
                'codigo' => '21',
                'titulo' => 'Cancelamento não efetuado',
                'descricao' => 'Não foi possível processar o cancelamento.',
                'retentativa' => 0
            ],
            [
                'codigo' => '22',
                'titulo' => 'Parcelamento inválido. Número de parcelas inválidas.',
                'descricao' => 'Não foi possível processar o cancelamento.',
                'retentativa' => 0
            ],
            [
                'codigo' => '24',
                'titulo' => 'Quantidade de parcelas inválido',
                'descricao' => 'Não foi possível processar o cancelamento.',
                'retentativa' => 0
            ],
            [
                'codigo' => '30',
                'titulo' => 'Não foi possível processar a transação. Solicite ao portador que reveja os dados e tente novamente',
                'descricao' => 'Não foi possível processar o cancelamento.',
                'retentativa' => 0
            ],
            [
                'codigo' => '39',
                'titulo' => 'Transação não autorizada. Erro no banco emissor',
                'descricao' => 'Transação não autorizada. Entre em contato com seu banco emissor.',
                'retentativa' => 0
            ],
            [
                'codigo' => '41',
                'titulo' => 'Cartão com restrição',
                'descricao' => 'Oriente o portador a contatar o emissor do cartão (Problemas com o cartão)',
                'retentativa' => 0
            ],
            [
                'codigo' => '43',
                'titulo' => 'Cartão com restrição',
                'descricao' => 'Oriente o portador a contatar o emissor do cartão (Problemas com o cartão)',
                'retentativa' => 0
            ],
            [
                'codigo' => '51',
                'titulo' => 'Saldo insuficiente',
                'descricao' => 'Cliente deve entrar em contato com o banco',
                'retentativa' => 1
            ],
            [
                'codigo' => '52',
                'titulo' => 'Cartão com dígito de controle inválido',
                'descricao' => 'Não foi possível processar a transação. Cartão com dígito de controle inválido',
                'retentativa' => 0
            ],
            [
                'codigo' => '54',
                'titulo' => 'Cartão vencido',
                'descricao' => 'Caso os dados informados estejam corretos, cliente deve entrar em contato com o banco para verificar se cartão ainda é valido',
                'retentativa' => 0
            ],
            [
                'codigo' => '55',
                'titulo' => 'Senha Inválida',
                'descricao' => 'Senha informada está errada',
                'retentativa' => 0
            ],
            [
                'codigo' => '57',
                'titulo' => 'Transação não permitida ou não autorizada',
                'descricao' => 'Venda não autorizada pelo emissor do cartão, pois o cartão utilizado não faz parte da rede Verified by Visa ou o sistema de prevenção do banco não autorizou a compra, neste caso o cliente deverá realizar contato com banco emissor do cartão e informar que está tentando realizar uma compra no valor R$XXX e não está sendo autorizada.',
                'retentativa' => 0
            ],
            [
                'codigo' => '58',
                'titulo' => 'Transação não permitida',
                'descricao' => 'N/A',
                'retentativa' => 0
            ],
            [
                'codigo' => '60',
                'titulo' => 'Transação não permitida',
                'descricao' => 'Oriente o portador a contatar oemissor do cartão',
                'retentativa' => 0
            ],
            [
                'codigo' => '61',
                'titulo' => 'Banco emissor Visa indisponível.',
                'descricao' => 'Transação não autorizada. Tente novamente. Se o erro persistir, entre em contato com seu banco emissor.',
                'retentativa' => 1
            ],
            [
                'codigo' => '62',
                'titulo' => 'Cartão com restrição.',
                'descricao' => 'Oriente o portador a contatar o emissor do cartão. Cartão com algum bloqueio para transações online.',
                'retentativa' => 0
            ],
            [
                'codigo' => '63',
                'titulo' => 'Cartão com restrição',
                'descricao' => 'Oriente o portador a contatar o emissor do cartão. Possível erro de segurança ao tentar processar',
              'retentativa' => 0
            ],
            [
                'codigo' => '65',
                'titulo' => 'Cartão com restrição', 
                'descricao' => 'Transação Negada. Oriente o portador a contatar o emissor do cartão (Problemas com o cartão)',
              'retentativa' => 0
            ],
            [
                'codigo' => '67',
                'titulo' => 'Transação não autorizada',
                'descricao' => 'Transação não autorizada. Cartão bloqueado para compras hoje. Bloqueio pode ter ocorrido por excesso de tentativas inválidas',
               'retentativa' => 1
            ],
            [
                'codigo' => '70',
                'titulo' => 'ransação não autorizada. Limite excedido/sem saldo.',
                'descricao' => 'Transação não autorizada. Entre em contato com seu banco emissor.',
               'retentativa' => 1
            ],
            [
                'codigo' => '74',
                'titulo' => 'Transação não autorizada.',
                'descricao' => 'Transação não autorizada. A senha está vencida.',
              'retentativa' => 0
            ],
            [
                'codigo' => '75',
                'titulo' => 'Cartão com restrição.',
                'descricao' => 'Motivo provável, Bloqueio de senha. Oriente o portador a contatar o emissor do cartão.',
              'retentativa' => 0
            ],
            [
                'codigo' => '76',
                'titulo' => 'Tente novamente.',
                'descricao' => 'N/A',
               'retentativa' => 1
            ],
            [
                'codigo' => '77',
                'titulo' => 'Cancelamento não efetuado.',
                'descricao' => 'Cancelamento não efetuado. Não foi localizado a transação original',
              'retentativa' => 0 
            ],
            [
                'codigo' => '78', 
                'titulo' => 'Cartão não foi desbloqueado pelo portador.',
                'descricao' => 'Cartão bloqueado. Oriente o portador a desbloqueá-lo junto ao emissor do cartão.',
              'retentativa' => 0
            ],
            [
                'codigo' => '80',
                'titulo' => 'Transação não autorizada.',
                'descricao' => 'Transação não autorizada. Data da transação ou data do primeiro pagamento inválida. Refazer confirmando os dados', 
              'retentativa' => 0
            ],
            [
                'codigo' => '81',
                'titulo' => 'Transação negada.',
                'descricao' => 'N/A', 
              'retentativa' => 0
            ],
            [
                'codigo' => '82',
                'titulo' => 'Transação inválida.',
                'descricao' => 'Provável Código de Segurança Incorreto ou Inválido', 
              'retentativa' => 0
            ],
            [
                'codigo' => '85',
                'titulo' => 'Transação não permitida. Falha da operação.',
                'descricao' => 'Transação não permitida. Houve um erro no processamento. Solicite ao portador que digite novamente os dados do cartão.',
              'retentativa' => 0
            ],
            [
                'codigo' => '88',
                'titulo' => 'Erro na transação.',
                'descricao' => 'Transação não autorizada. Erro na transação. O portador deve tentar novamente e se o erro persistir, entrar em contato com o banco emissor.',
               'retentativa' => 1
            ],
            [
                'codigo' => '90',
                'titulo' => 'Transação não permitida. Falha da operação.',
                'descricao' => 'Transação não permitida. Houve um erro no processamento. Solicite ao portador que digite novamente os dados do cartão',
              'retentativa' => 0
            ],
            [
                'codigo' => '91',
                'titulo' => 'Banco indisponível.',
                'descricao' => 'Emissor sem comunicação. Oriente cliente a aguardar alguns minutos e tente novamente.', 
               'retentativa' => 1
            ],
            [
                'codigo' => '92',
                'titulo' => 'Transação não autorizada. Tempo de comunicação excedido.',
                'descricao' => 'Transação não autorizada. Tempo de comunicação excedido', 
              'retentativa' => 0
            ],
            [
                'codigo' => '94',
                'titulo' => 'Transação não autorizada.',
                'descricao' => 'Transação desfeita pela bandeira',
              'retentativa' => 0 
            ],
            [
                'codigo' => '96',
                'titulo' => 'Tente novamente.',
                'descricao' => 'Provável venda abaixo de R$ 1,00. Falha no envio da autorização.', 
               'retentativa' => 1
            ],
            [
                'codigo' => '99',
                'titulo' => 'Sistema do banco temporariamente fora de operação.', 
                'descricao' => 'Tente novamente mais tarde', 
              'retentativa' => 0
            ],
            [
                'codigo' => 'AA',
                'titulo' => 'Tempo Excedido.',
                'descricao' => 'Tempo excedido na comunicação como banco emissor. Oriente o portador atentar novamente, se o erro persistir será necessário que o portador contate seu banco emissor.',
                'retentativa' => 1
            ],
            [
                'codigo' => 'AC',
                'titulo' => 'Cartão de débito sendo usado com crédito.',
                'descricao' => 'Cartão de débito sendo usado com crédito. Portador deve usar um cartão de Crédito',
                'retentativa' => 0 
            ],
            [
                'codigo' => 'AE',
                'titulo' => 'Tente Mais Tarde.',
                'descricao' => 'Tempo excedido na comunicação como banco emissor. Oriente o portador atentar novamente',
                'retentativa' => 1
            ],
            [
                'codigo' => 'AF', 
                'titulo' => 'Transação não permitida. Falha da operação.',
                'descricao' => 'Transação não permitida. Houve um erro no processamento. Solicite ao portador que digite novamente os dados do cartão.',
                'retentativa' => 0
            ],
            [
                'codigo' => 'AG',
                'titulo' => 'Transação não permitida. Falha da operação.',
                'descricao' => 'Houve um erro no processamento. Solicite ao portador que digite novamente os dados do cartão',
                'retentativa' => 0
            ],
            [
                'codigo' => 'AI', 
                'titulo' => 'Transação não autorizada. Autenticação não foi realizada.',
                'descricao' => 'Transação não autorizada. Autenticação não foi realizada. O portador não concluiu a autenticação.',
                'retentativa' => 0
            ],
            [
                'codigo' => 'AV',
                'titulo' => 'Transação não autorizada. Dados Inválidos.',
                'descricao' => 'Falha na validação dos dados da transação. Oriente o portador a rever os dados e tentar novamente.',
                'retentativa' => 1 
            ],
            [
                'codigo' => 'BD',
                'titulo' => 'Transação não permitida. Falha da operação.',
                'descricao' => 'Transação não permitida. Houve um erro no processamento. Solicite ao portador que digite novamente os dados do cartão.',
                'retentativa' => 0
            ],
            [
                'codigo' => 'BL',
                'titulo' => 'Transação não autorizada. Limite diário excedido.',
                'descricao' => 'Transação não autorizada. Limite diário excedido. Solicite ao portador que entre em contato com seu banco emissor.',
                'retentativa' => 0
            ],
            [
                'codigo' => 'BM',
                'titulo' => 'Transação não autorizada. Cartão Inválido.',
                'descricao' => 'Transação não autorizada. Cartão inválido. Pode ser bloqueio do cartão no banco emissor.',
                'retentativa' => 0
            ],
            [
                'codigo' => 'BN',
                'titulo' => 'Transação não autorizada. Cartão ou conta bloqueado.',
                'descricao' => 'Transação não autorizada. O cartão ou a conta do portador está bloqueada. Solicite ao portador que entre em contato com seu banco emissor.',
                'retentativa' => 0
            ],
            [
                'codigo' => 'BV', 
                'titulo' => 'Transação não autorizada. Cartão vencido', 
                'descricao' => 'Transação não autorizada. Cartãovencido.',
                'retentativa' => 0
            ],
            [
                'codigo' => 'CF',
                'titulo' => 'Transação não autorizada. Falha na validação dos dados.',
                'descricao' => 'Transação não autorizada. Falha navalidação dos dados. Solicite aoportador que entre em contato comobanco emissor.',
                'retentativa' => 0
            ],
            [
                'codigo' => 'EE',
                'titulo' => 'Transação não permitida. Valor da parcela inferior ao mínimo permitido.',
                'descricao' => 'Transação não permitida. Valor da parcela inferior ao mínimo permitido. Não é permitido parcelas inferiores a R$ 5,00. Necessário rever calculo para parcelas.',
                'retentativa' => 0
            ],
            [
                'codigo' => 'FA',
                'titulo' => 'Transação não autorizada',
                'descricao' => 'Transação não autorizada AMEX',
                'retentativa' => 0
            ],
            [
                'codigo' => 'FC',
                'titulo' => 'Transação não autorizada. Ligue Emissor',
                'descricao' => 'Transação não autorizada. Oriente o portador a entrar em contato com o banco emissor.', 
                'retentativa' => 0
            ],
            [
                'codigo' => 'GA',
                'titulo' => 'Transação não autorizada',
                'descricao' => 'Referida pela Cielo. Oriente o Sim portador a aguardar alguns instantes e tentar novamente.',
                'retentativa' => 1
            ],
            [
                'codigo' => 'GD',
                'titulo' => 'Transação não permitida', 
                'descricao' => 'Transação não é possível ser processada no estabelecimento. Entre em contato com a administradora do cartão para obter mais detalhes.',
                'retentativa' => 0
            ],
            [
                'codigo' => 'KA',
                'titulo' => 'Transação não permitida. Falha na validação dos dados.',
                'descricao' => 'Transação não permitida. Houve uma falha na validação dos dados. Solicite ao portador que reveja os dados e tente novamente.', 
                'retentativa' => 0
            ],
            [
                'codigo' => 'KE',
                'titulo' => 'Transação não autorizada. Falha na validação dos dados.',
                'descricao' => 'Transação não autorizada. Falha na validação dos dados.',
                'retentativa' => 0
            ],
            [
                'codigo' => 'N7',
                'titulo' => 'Transação não autorizada. Código de segurança inválido.',
                'descricao' => 'Transação não autorizada. Código de segurança inválido. Oriente o portador corrigir os dados e tentar novamente.',
                'retentativa' => 0
            ],
        ];

        foreach ($erros as $key => $erro) {
            Errositef::create($erro);
        }
    }
}
 