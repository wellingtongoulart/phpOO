conceitos de OO:

Abstração: se ater as características/aspectos essenciais da classe - não colocar atributos que não serão utilizados ou que sejam justificáveis. Segue exemplo:
class Conta
{
  public string $cpfTitular; //atributos da classe para o objeto
  public string $nomeTitular;
  public float $saldo;
}
Uma conta possui mais que esses três atributos, claro, mas para este caso somentes esses serão usados, logo, somente esses são atribuidos a classe.
ANTES DE CRIAR CLASSE, ABSTRAIR SOBRE AS FUNÇÕES PRÁTICAS DE CADA ATRIBUTO.



Encapsulamento: proteger as instâncias da classe de possíveis alterações, tornando-as private. Para enviar e receber dados das mesmas, usar set/get(podendo e talvez devendo,
usar verbos no lugar), deste modo é possível ter um acesso limitado a instância e ainda usa-la como molde, modelo, esqueleto dos objetos.


Válido para estudos (projeto antes da separação Contas/Titular, com comentários):


        cada classe em seu arquivo - abstrair
        //propriedades privadas e métodos públicos
        //definir classe é prática de OO, sempre primeira maiscula - nela será definido os moldes que todo OBJETO/INSTANCIA conterá//
        class Conta //substantivo
        {
          private string $cpfTitular; //atributos da classe para o objeto
          private string $nomeTitular; //depois de se tornar privado, o usuario não tem mais acesso - encapsulamento
          private float $saldo;
          private static $numeroDeContas = 0; //atenção //atributo da classe em si - membro estático
          //dados

          public function __construct(string $cpfTitular, string $nomeTitular) //metodo construct é conectado com new Conta()
          {
            $this->cpfTitular = $cpfTitular;
            $this->nomeTitular = $nomeTitular;
            $this->validaNomeTitular($nomeTitular);
            $this->saldo = 0;

            self::$numeroDeContas++; //atenção //ou Conta
          }

          public  function __destruct() //remove da memória objetos que nao estão sendo referenciados por nenhuma variável - unset na variável exclui a conexão entre a mesma e o espaço na memória
          {
            self::$numeroDeContas--;
          }

          public function recuperarCpfTitular(): string //get
          {
            return $this->cpfTitular;
          }

          public function recuperarNomeTitular(): string //get
          {
            return $this->nomeTitular;
          }

          public function recuperarSaldo(): float //get
          {
            return $this->saldo;
          }

          public function sacar(float $valorASacar): void
          {
            if ($valorASacar > $this->saldo) {
              echo "Saldo indisponível";
              return;
            }
            $this->saldo -= $valorASacar;
          } //função de sacar dentro do molde da conta. o $this serve para modificar o atributo da objeto que o está chamando//

          public function depositar(float $valorADepositar): void //não devolve, não tem retorno
          {
            if ($valorADepositar < 0) { //evitar o uso de else, atenção ao uso do return, mas pode usar else
              echo "O valor precisa ser positivo";
              return;
            }
            $this->saldo += $valorADepositar;
          }

          public function transferir(float $valorATransferir, Conta $contaDestino): void
          {
            if ($valorATransferir > $this->saldo) {
              echo "Saldo indisponível";
              return;
            }
            $this->sacar($valorATransferir);
            $contaDestino->depositar($valorATransferir);
          }

          private function validaNomeTitular(string $nomeTitular)
          {
            if (strlen($nomeTitular) < 6) {
              echo "Favor inserir nome e sobrenome";
              exit();
            }
          }

          public static function recuperarNumeroDeContas(): int
          {
            return self::$numeroDeContas; //ou Conta
          }
          //comportamentos
        }

    //As variáveis possuem um endereço para a classe, não possuem um valor inteiro, e por isso é possível ter mais que uma variável apontando para o mesmo lugar
    //Objeto
    /*     $primeiraConta = new Conta();
          $primeiraConta->cpfTitular = '123.456.789-10';
          $primeiraConta->nomeTitular = 'Vinicius Viana';
          $primeiraConta->saldo = '5000';

          $segundaConta = new Conta();
          $segundaConta->cpfTitular = '987.654.321-41';
          $segundaConta->nomeTitular = 'Alan Araujo';
          $segundaConta->saldo = '200';

          $teste = $segundaConta;
          $teste->saldo = 2000;

          $segundaConta->depositar(-150);

          $contaTeste = new Conta();
          $contaTeste->depositar(5080);
          $contaTeste2 = new Conta();
          $contaTeste->transferir(200, $contaTeste2);
    não vou mais utilizar pela mudança na regra de negócio, mas fica o exemplo


    /*
    exemplo de função criar conta:
    function criarConta(string $cpf, string $nomeTitular, float $saldo): array
    {
      return [
        $cpf => [
          'titular' => $nomeTitular,
          'saldo' => $saldo
        ]
      ];
    }
    */

