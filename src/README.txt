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