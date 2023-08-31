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
        DB::table('errositefes')->insert(
            [
                [
                    'codigo' => '00',
                    'titulo' => 'Transação Nacional Autorizada com sucesso',
                    'desricao' => 'N/A',
                    'retentativa' => ''
                ],
                [
                    'codigo' => '01',
                    'titulo' => 'Transação referida pelo emissor',
                    'desricao' => 'Oriente o portador a contatar oemissor do cartão',
                    'retentativa' => 0
                ],
                [
                    'codigo' => '02',
                    'titulo' => 'Transação referida pelo',
                    'desricao' => 'Oriente o portador a contatar oemissor do cartão',
                    'retentativa' => 0
                ],
                [
                    'codigo' => '03',
                    'titulo' => 'Não foi encontrada a transação',
                    'desricao' => 'Este erro pode ser: * número de parcelas ultrapassa opermitido. * código de segurança inválido * número do cartão inválido * instabilidade no sistema daadquirente',
                    'retentativa' => 1
                ],
                [
                    'codigo' => '04',
                    'titulo' => 'Cartão com restrição',
                    'desricao' => 'Oriente o portador a contatar oemissor do cartão (Problemas comocartão)',
                    'retentativa' => 0
                ],
                [
                    'codigo' => '05',
                    'titulo' => 'Transação não autorizada',
                    'desricao' => 'Oriente o portador a contatar oemissor do cartão (não autorizadapelo emissor)',
                    'retentativa' => 0
                ],
                [
                    'codigo' => '06',
                    'titulo' => 'Tente novamente',
                    'desricao' => 'Problemas ocorridos na transação eletrônica, instabilidade da adquirente.',
                    'retentativa' => 1
                ],
                [
                    'codigo' => '07',
                    'titulo' => 'Cartão com restrição',
                    'desricao' => 'Oriente o portador a contatar oemissor do cartão (Problemas comocartão)',
                    'retentativa' => 0
                ],
                [
                    'codigo' => '08',
                    'titulo' => 'Código de segurança inválido',
                    'desricao' => 'O código de segurança foi informadoerrado no momento da compra',
                    'retentativa' => 0
                ],
                [
                    'codigo' => '10',
                    'titulo' => 'Não é permitido o envio do cartão',
                    'desricao' => 'Adquirente está com os serviços instáveis, caso o erro continueocorrendo entre em contato comnosso suporte técnico',
                    'retentativa' => 0
                ],
                [
                    'codigo' => '11',
                    'titulo' => 'Transação Internacional Autorizada com sucesso',
                    'desricao' => 'N/A',
                    'retentativa' => 0
                ],
                [
                    'codigo' => '12',
                    'titulo' => 'Transação Inválida',
                    'desricao' => 'Venda não autorizada pelo bancoemissor do cartão. Cartão informadono momento da compra está incorreto',
                    'retentativa' => 0
                ],
                [
                    'codigo' => '13',
                    'titulo' => 'Valor inválido',
                    'desricao' => 'Verifique valor mínimo de R$5,00 para parcelamento',
                    'retentativa' => 0
                ],
                [
                    'codigo' => '14',
                    'titulo' => 'Cartão inválido',
                    'desricao' => 'N/A',
                    'retentativa' => 0
                ],
                [
                    'codigo' => '15',
                    'titulo' => 'Emissor inválido',
                    'desricao' => 'Emissor sem comunicação.',
                    'retentativa' => 0
                ],
                [
                    'codigo' => '19',
                    'titulo' => 'Refaça a transação ou tente novamente mais tarde.',
                    'desricao' => 'Não foi possível processar atransação. Refaça a transação ou tente novamente mais tarde',
                    'retentativa' => 1
                ],
                [
                    'codigo' => '21',
                    'titulo' => 'Cancelamento não efetuado',
                    'desricao' => 'Não foi possível processar o cancelamento.',
                    'retentativa' => 0
                ],[
                    'codigo' => '22',
                    'titulo' => 'Parcelamento inválido. Número de parcelas inválidas.',
                    'desricao' => 'Não foi possível processar o cancelamento.',
                    'retentativa' => 0
                ],
                [
                    'codigo' => '24',
                    'titulo' => 'Quantidade de parcelas inválido',
                    'desricao' => 'Não foi possível processar o cancelamento.',
                    'retentativa' => 0
                ],
                [
                    'codigo' => '30',
                    'titulo' => 'Não foi possível processar a transação. Solicite ao portador que reveja os dados e tente novamente',
                    'desricao' => 'Não foi possível processar o cancelamento.',
                    'retentativa' => 0
                ],
                [
                    'codigo' => '39',
                    'titulo' => 'Transação não autorizada. Erro no banco emissor',
                    'desricao' => 'Transação não autorizada. Entre emcontato com seu banco emissor.',
                    'retentativa' => 0
                ],
                [
                    'codigo' => '41',
                    'titulo' => 'Cartão com restrição',
                    'desricao' => 'Oriente o portador a contatar oemissor do cartão (Problemas comocartão)',
                    'retentativa' => 0
                ],
                [
                    'codigo' => '43',
                    'titulo' => 'Cartão com restrição',
                    'desricao' => 'Oriente o portador a contatar oemissor do cartão (Problemas comocartão)',
                    'retentativa' => 0
                ],
                [
                    'codigo' => '51',
                    'titulo' => 'Saldo insuficiente',
                    'desricao' => 'Cliente deve entrar em contato comobanco',
                    'retentativa' => 1
                ],
                [
                    'codigo' => '52',
                    'titulo' => 'Cartão com dígito de controle inválido',
                    'desricao' => 'Não foi possível processar atransação. Cartão comdígito decontrole inválido',
                    'retentativa' => 0
                ],
                [
                    'codigo' => '54',
                    'titulo' => 'Cartão vencido',
                    'desricao' => 'Caso os dados informados estejam corretos, cliente deve entrar emcontato com o banco para verificar secartão ainda é valido',
                    'retentativa' => 0
                ],
                [
                    'codigo' => '55',
                    'titulo' => 'Senha Inválida',
                    'desricao' => 'Senha informada está errada',
                    'retentativa' => 0
                ],
                [
                    'codigo' => '57',
                    'titulo' => 'Transação não permitida ou não autorizada',
                    'desricao' => 'Venda não autorizada pelo emissor do cartão, pois o cartão utilizado não faz parte da rede Verified by Visa ou o sistema de prevenção do banco não autorizou a compra, neste caso o cliente deverá realizar contato com banco emissor do cartão e informar que está tentando realizar uma compra no valor R$XXX e não está sendo autorizada.',
                    'retentativa' => 0
                ],
                [
                    'codigo' => '58',
                    'titulo' => 'Transação não permitida',
                    'desricao' => 'N/A',
                    'retentativa' => 0
                ],
                [
                    'codigo' => '60',
                    'titulo' => 'Transação não permitida',
                    'desricao' => 'Oriente o portador a contatar oemissor do cartão',
                    'retentativa' => 0
                ],
                
            ]
        );
    }
}
 